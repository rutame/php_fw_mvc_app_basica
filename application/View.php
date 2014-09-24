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

class View 
{
    private $_controlador;
    
    public function __construct(Request $peticion)
    {
        $this->_controlador = $peticion->getControlador();
    }
    
    /**
     * 
     * @param type $vista
     * @throws Exception
     */
    public function render($vista, $item = FALSE)
    {
        $menu = $this->menu();

        $_layoutParams = $this->layoutParam($menu);
                
        // obtener la ruta de la vista a cargar
        $rutaView = ROOT.'views' . DS . $this->_controlador . DS . $vista . '.phtml';
        
        // Comprobamos que exista esa vista en caso contrario lanza excepción
        if(is_readable($rutaView)){
            require_once ROOT .'views/layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            require_once $rutaView;
            require_once ROOT .'views/layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        }else{
            throw new Exception("Error de vista!");
        }
    }
    
    /**
     * 
     * @return array
     */
    public function menu()
    {
       $menu = array(
                    array(
                        'id' => 'inicio',
                        'titulo' => 'Inicio',
                        'enlace' => BASE_URL ),
                    array(
                        'id' => 'post',
                        'titulo' => 'Publicaciones',
                        'enlace' => BASE_URL . 'post')
                    ); 
                    return $menu;
    }
    
    /**
     * 
     * @param type $menu
     * @return string
     */
    public function layoutParam($menu)
    {
        $_layoutParams = 
                array(
                    'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
                    'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
                    'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
                    'menu' => $menu
                ); 
                return $_layoutParams;
    }
}
