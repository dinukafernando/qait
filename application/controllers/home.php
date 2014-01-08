<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();

        // Load URL helper
        $this->load->helper('url');       
   
    }

    public function index() {
        
        // Get user details from session
        $this->userdetails = $this->session->userdata('userdetails');        
        $session_id = $this->session->userdata('session_id');
        $this->load->view('test_view', array('name' => $this->userdetails['userdetail']['firstname'],'currentsession' => $session_id));
    }

}

?>
