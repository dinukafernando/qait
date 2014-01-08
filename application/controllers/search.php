<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
    }

    public function index() {
        // Get user details from session
        $this->userdetails = $this->session->userdata('userdetails');        
        $session_id = $this->session->userdata('session_id');        
        $category = $this->getcategories();  
        $questions = $this->allquestions();
        $this->load->view('search_view', array('name' => $this->userdetails['userdetail']['firstname'],'currentsession' => $session_id, 'category' => $category, 'questions' => $questions));        
    }
    
    public function allquestions() {
        $text = $this->input->get('text');
        $url = base_url() . 'api/search/question/title/s/' . $text;
        $cookie = (isset($_COOKIE['glk_session'])) ? 'glk_session=' . urlencode($_COOKIE['glk_session']) : '';
        $httpua = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, $httpua);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $returndata['data'] = json_decode(curl_exec($ch), true);
        curl_close($ch);
        $htmldata = $this->load->view('result_view', $returndata, true);
        return $htmldata;
        //$this->load->view('search_view', $returndata, true);
        //echo $text;
        //var_dump($htmldata);
    }

    public function question() {
        $text = $this->input->get('text');
        $url = base_url() . 'api/search/question/title/s/' . $text;
        $cookie = (isset($_COOKIE['glk_session'])) ? 'glk_session=' . urlencode($_COOKIE['glk_session']) : '';
        $httpua = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, $httpua);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $returndata['data'] = json_decode(curl_exec($ch), true);
        curl_close($ch);
        $htmldata = $this->load->view('result_view', $returndata, true);
        echo $htmldata;
        //$this->load->view('search_view', $returndata, true);
        //echo $text;
        //var_dump($htmldata);
    }
    
    public function getcategories() {
        $url = base_url() . 'api/category/';
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
        //$htmldata = $this->load->view('result_view', $returndata, true);        
        return $returndata;
    }

}

?>