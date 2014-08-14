<?php

class Student_Model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_students()
    {
        $query = $this->db->get('Alumno');
        return $query->result();
    }
}