<?php


namespace App\Core\Form;


use App\Core\Model;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_NUMBER = 'number';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_EMAIL = 'email';

    public string $type;
    public Model $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
       return sprintf('
            <div class="form-group">
               <label>%s</label>
               <input name="%s" type="%s" value="%s" class="form-control%s">
               <div class="invalid-feedback">
                 %s
               </div>
            </div>
       ',
        $this->attribute,
        $this->attribute,
        $this->type,
        $this->model->{$this->attribute},
        $this->model->hasError($this->attribute) ? ' is-invalid' : '',
       $this->model->getFirstError($this->attribute)
       );
    }
    
    public function passwordFiled()
    {
        $this->type = self::TYPE_PASSWORD;

        return $this;
    }

    public function emailField()
    {
        $this->type = self::TYPE_EMAIL;

        return $this;
    }
}