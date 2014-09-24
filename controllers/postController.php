<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class postController extends Controller
{
    private $_post;


    public function __construct()
    {
        parent::__construct();
        $this->_post = $this->loadModel('post');
    }
    
    public function index()
    {
        $post = $this->loadModel('post');
        
        $this->_view->posts = $this->_post->getPosts();
        
        $this->_view->titulo = "Publicaciones"; 
        $this->_view->render('index', 'post');
    }
    
    public function nuevo()
    {
        $this->_view->titulo = "Nuevo Post";
        if(filter_input(INPUT_POST, 'accion') === 'Guardar'):
            $this->_post->setPost(
                    filter_input(INPUT_POST, 'titulo'),  
                    filter_input(INPUT_POST, 'cuerpo')
                    );
        endif;
        $this->_view->render('nuevo', 'post');
    }
}
