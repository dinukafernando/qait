<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        // Load URL helper
        $this->load->helper('url');

        //Load Authlib library
        $this->load->library('authlib');
    }
    
    public function index() {
        if ($this->authlib->isloggedin() === false) {
            $this->load->view('login_view');
        } else {
            redirect('home');
        }
    }
    
    public function authenticate() {
        $username = $this->input->get('username');
        $password = $this->input->get('password');
        $url = base_url() . 'api/authenticate/username/' . $username . '/password/' . $password;
        $cookie = (isset($_COOKIE['glk_session'])) ? 'glk_session=' . urlencode($_COOKIE['glk_session']) : '';
        $httpua = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, $httpua);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $returndata = json_decode(curl_exec($ch), true);
        curl_close($ch);
        //$this->load->view('test_view', $returndata, true);
        var_dump($returndata);
//        $status = $returndata['status']; 
//        if ($status == 0){
//            redirect('home');
//        }
    }
    
//       public function authenticate() {
//
//        $searchquery = (strpos($this->input->get('query'), ' ') ? str_replace(' ', '-', $this->input->get('query')) : $this->input->get('query'));
//        $url = base_url() . 'api/questions/type/query/question/' . $searchquery;
//        $cookie = (isset($_COOKIE['aayw_session'])) ? 'aayw_session=' . urlencode($_COOKIE['aayw_session']) : '';
//        $httpua = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
//        curl_setopt($ch, CURLOPT_HEADER, FALSE);
//        curl_setopt($ch, CURLOPT_USERAGENT, $httpua);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        $returndata['data'] = json_decode(curl_exec($ch), true);
//        curl_close($ch);
//        $htmldata = $this->load->view('questions_view', $returndata, true);
//        echo $htmldata;
//    }
    
    
    
}

?>