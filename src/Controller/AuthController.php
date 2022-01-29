<?php


namespace App\Controller;


use App\Core\AbstractController;
use App\Core\Request;
use App\Models\RegisterModel;

class AuthController extends AbstractController
{
    public function login(Request $request)
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();

        if ($request->isPost()){
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()){
                echo 'Success';
            }

            return $this->render('register', ['model'=> $registerModel]);
        }

        $this->setLayout('auth');

       return $this->render('register', ['model'=> $registerModel]);
    }
}