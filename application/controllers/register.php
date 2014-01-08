<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        // Load URL helper
        $this->load->helper('url');   
    }
    
    public function index() {
        $this->load->view('login_view');
    }

}

?>