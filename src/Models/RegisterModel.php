<?php

namespace App\Models;

use App\Core\Model;

class RegisterModel extends Model
{
    public string $firstname = '';

    public string $lastName = '';

    public string $email = '';

    public string $password = '';

    public string $confirmPassword = '';

    public function register()
    {
        echo "Creating new user";
    }


    public function rules(): array
    {
        return [
            'firstname' => [self::ROLE_REQUIRED],
            'lastName' => [self::ROLE_REQUIRED],
            'email' => [self::ROLE_REQUIRED, self::ROLE_EMAIL],
            'password' => [self::ROLE_REQUIRED, [self::ROLE_MIN, 'min' => 8],[self::ROLE_MAX, 'max' =>  20]],
            'confirmPassword' => [self::ROLE_REQUIRED, [self::ROLE_MATCH, 'match' => 'password']],
        ];
    }
}