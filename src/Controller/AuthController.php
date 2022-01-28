<?php


namespace App\Controller;


use App\Core\AbstractController;
use App\Core\Request;

class AuthController extends AbstractController
{
    public function login(Request $request)
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        if ($request->isPost()){
            return 'Submitted data';
        }
        $this->setLayout('auth');
        return $this->render('register');
    }
}