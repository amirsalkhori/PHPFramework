<?php

namespace App\Controller;


use App\Core\AbstractController;
use App\Core\Request;

class SiteAbstractController extends AbstractController
{
    public function home()
    {
        $params = [
            'name' => 'Amir Salkhori 124'
        ];

        return $this->render('home', $params);
    }

    public function contact()
    {
        return $this->render('contact', ['name'=>'amir']);
    }

    public function handleContact(Request $request)
    {
       return $request->getBody();
    }

}