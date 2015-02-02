<?php

class Home_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_novedades(){
        $string_query = $this->db->query("SELECT CONVERT(VARCHAR(11),fecha, 104) as 'fecha', titulo, descripcion, rutaArchivo
                                          FROM   Novedad
                                          WHERE  YEAR (fecha) = YEAR (getdate())
                                          ORDER BY idNovedad DESC");                                          
        return $string_query->result();        
    }
    
}
