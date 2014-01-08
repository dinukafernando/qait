<?php
class Answers extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('authlib');

    }

    public function index() {
        return false;
    }
    
    public function post() {
        $content = $this->input->post('answer');
        $questionid = $this->input->post('questionid');
        echo $questionid;
        $url = base_url() . 'api/answer/action/post';
        $fields = array(
            'content' => urlencode($content),
            'questionid' => urlencode($questionid)
        );              
        $cookie = (isset($_COOKIE['glk_session'])) ? 'glk_session=' . urlencode($_COOKIE['glk_session']) : '';
        $httpua = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, $httpua);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        $returndata = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $returndata;
    }

}