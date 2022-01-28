<?php


namespace App\Controller;


use App\Core\AbstractController;
use App\Core\Request;

class AuthController extends AbstractController
{
    public function login(Request $request)
    {
        return $this->render('login', ['login'=>'page']);
    }

    public function register(Request $request)
    {
        if ($request->isPost()){
            return 'Submitted data';
        }
        return $this->render('register');
    }
}