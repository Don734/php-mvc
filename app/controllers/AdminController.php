<?php

namespace App\Controllers;

use App\Core\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Страница админа');
    }
}
