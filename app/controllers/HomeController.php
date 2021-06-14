<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Главная страница');
    }
}
