<?php
namespace controllers;

use kernels\base\Controller;
 
class HomeController extends Controller
{
    public function index()
    {
        $this->render();
    }
}