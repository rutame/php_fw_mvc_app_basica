<?php

/*
 * Copyright (C) 2014 Pedro Gabriel Manrique Gutiérrez <pedrogmanrique at gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class Bootstrap 
{
   
    public static function run(Request $peticion)
    {
        // Obtenemos el controlador 1er parámetro y lo concatenamos con controller ej: indexController
        $controller = $peticion->getControlador() . 'Controller';
        
        $rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
        $metodo = $peticion->getMetodo();
        $argumentos = $peticion->getArgumentos();
        
        if(is_readable($rutaControlador)) {
            require_once $rutaControlador;
            
            $controller = new $controller;
            
            if(is_callable(array($controller, $metodo))){
                $metodo = $peticion->getMetodo();
            }else{
                $metodo = 'index';
            }
            
            if(!empty($argumentos)){
                call_user_func_array(array($controller, $metodo), $argumentos);
            }else{ 
                call_user_func(array($controller, $metodo));
            }
            
        }
        else{
            throw new Exception("No se ha encontrado ese controlador!");
        }
        
    }
}
