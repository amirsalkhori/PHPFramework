<h1>Register Form</h1>
<?php echo $form = \App\Core\Form\Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'firstname') ?>
    <?php echo $form->field($model, 'lastName') ?>
    <?php echo $form->field($model, 'password')->passwordFiled() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordFiled() ?>
    <?php echo $form->field($model, 'email')->emailField() ?>
<button type="submit" class="btn btn-primary">Submit</button>

<?php \App\Core\Form\Form::end() ?>