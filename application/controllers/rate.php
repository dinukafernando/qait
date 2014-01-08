<?php
class Rate extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('authlib');

    }

    public function index() {
        return false;
    }
    
    public function question() {
        $questionid = $this->input->post('questionid');
        $rateamount = $this->input->post('rateamount');
                
        $url = base_url() . 'api/question/action/rate';

        $fields = array(
            'questionid' => urlencode($questionid),
            'rateamount' => urlencode($rateamount)
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
        $returndata = curl_exec($ch);
        curl_close($ch);
        print_r($returndata);
    }

    public function answer() {
        $answerid = $this->input->post('answerid');
        $rateamount = $this->input->post('rateamount');
                
        $url = base_url() . 'api/answer/action/rate';

        $fields = array(
            'answerid' => urlencode($answerid),
            'rateamount' => urlencode($rateamount)
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
        $returndata = curl_exec($ch);
        curl_close($ch);
        print_r($returndata);
    }
}