<?php

class Teacher_Model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_students($columna, $legajo)
    {
        $string_query = $this->db->query("SELECT $columna FROM Alumno WHERE legajoAlumno = $legajo");
        return $string_query->result();
    }

    function get_all_students_complete(){
        $string_query = $this->db->query("SELECT * FROM Alumno");
        return $string_query->result();
    }

}