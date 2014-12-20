<?php

class Home_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_novedades(){
        $string_query = $this->db->query("SELECT fecha, titulo, descripcion, rutaArchivo
                                          FROM Novedad");
                                          
        return $string_query->result();        
    }
}