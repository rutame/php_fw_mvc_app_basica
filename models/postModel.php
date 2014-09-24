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

class postModel extends Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getPosts()
    {
       $posts = $this->_db->query("SELECT * FROM posts ORDER BY fechaPub DESC");
       
       $posts = $posts->fetchALL(PDO::FETCH_ASSOC);
       
       return $posts;
    }
    
    /**
     * 
     * @param type $titulo
     * @param type $cuerpo
     */
    public function setPost($titulo, $cuerpo)
    {
        $sql = "INSERT INTO posts(titulo, cuerpo) VALUES (:titulo, :cuerpo )";
        $stm = $this->_db->prepare($sql);
        
        $stm->bindParam(':titulo', $titulo);
        $stm->bindParam(':cuerpo', $cuerpo);
        
        $stm->execute();
        
        $idp = $this->_db->lastInsertId();
        echo "El ID: " . $idp;
    }
}
