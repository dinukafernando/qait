<?php

class Questions extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('authlib');
    }

    public function index() {
        $this->userdetails = $this->session->userdata('userdetails');
        $session_id = $this->session->userdata('session_id');
        $category = $this->getcategories();
        $questions = $this->allquestions();
        $this->load->view('search_view', array('name' => $this->userdetails['userdetail']['firstname'], 'currentsession' => $session_id, 'category' => $category, 'questions' => $questions));
    }

    public function ask() {
        $this->userdetails = $this->session->userdata('userdetails');
        $category = $this->getcategories();
        $keywords = $this->getkeywords();
        $this->load->view('ask_question_view', array('name' => $this->userdetails['userdetail']['firstname'], 'category' => $category, 'keywords' => $keywords));
    }

    public function title() {
        $args = $this->uri->uri_to_assoc(2);
        $this->userdetails = $this->session->userdata('userdetails');
        $question_detail = $this->getquestionbytitle($args['title']);
        $keywords = $this->getkeywords();
        $question_answers = $this->getanswersbyquestionid($question_detail['questionid']);
        $this->load->view('single_question_view', array('name' => $this->userdetails['userdetail']['firstname'], 'question' => $question_detail, 'answers' => $question_answers, 'keywords' => $keywords));
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

    public function getanswersbyquestionid($questionid) {
        $url = base_url() . 'api/answer/questionid/' . $questionid;
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
        return $returndata;
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

    public function getkeywords() {
        $url = base_url() . 'api/keyword/';
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

    public function getquestionbytitle($text) {

        $url = base_url() . 'api/question/title/' . $text;
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
        return $returndata;
    }

    public function post() {
        $category = $this->input->post('category');
        $title = $this->input->post('title');
        $body = $this->input->post('body');
        $keywords = $this->input->post('keywords');
        //echo urldecode(urlencode($keywords));
        $url = base_url() . 'api/question/action/post';

        $fields = array(
            'category' => urlencode($category),
            'title' => urlencode($title),
            'body' => urlencode($body),
            'keywords' => urlencode($keywords)
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
        echo $returndata;
    }

    public function update() {
        $questionid = $this->input->post('question_id');
        $title = $this->input->post('title');
        $body = $this->input->post('body');
        $keywords = $this->input->post('keywords');
        $url = base_url() . 'api/question/action/update';

        $fields = array(
            'questionid' => urlencode($questionid),
            'title' => urlencode($title),
            'body' => urlencode($body),
            'keywords' => urlencode($keywords)
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
        echo $returndata;
    }

}

?>
