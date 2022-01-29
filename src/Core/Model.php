<?php


namespace App\Core;


abstract class Model
{
    public const ROLE_REQUIRED = 'required';
    public const ROLE_EMAIL = 'email';
    public const ROLE_MIN = 'min';
    public const ROLE_MAX = 'max';
    public const ROLE_MATCH = 'match';

    abstract public function rules();

    public function loadData($data)
    {
        foreach ($data as $key => $value){
            if (property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }

    public array $errors = [];

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules){
            $value = $this->{$attribute};

            foreach ($rules as $rule){
                $ruleName = $rule;
                if (!is_string($ruleName)){
                    $ruleName = $rule[0];
                }

                if ($ruleName === self::ROLE_REQUIRED && !$value ){
                    $this->addError($attribute, self::ROLE_REQUIRED);
                }
//                if ($ruleName === self::ROLE_EMAIL && filter_var($value, FILTER_VALIDATE_EMAIL)){
//                    $this->addError($attribute, self::ROLE_EMAIL);
//                }
            }
        }

        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule)
    {
        $message = $this->errorMessages()[$rule] ?? '';
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages(){
        return [
            self::ROLE_REQUIRED => 'This field is require',
            self::ROLE_MIN => 'This length of this field must be {min}',
            self::ROLE_MAX => 'This length of this field must be {max}',
            self::ROLE_EMAIL => 'This field must be valid email',
            self::ROLE_MATCH => 'This field must be same as {match}',
        ];
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false ;
    }
}