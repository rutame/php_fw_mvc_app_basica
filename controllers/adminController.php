<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class adminController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->_view->titulo = "Administración";
        $this->_view->render('index', "admin");
    }
    
    public function nuevo()
    {
        
    }
}
