<?php

class Api extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');

        $this->load->library('authlib');

        $this->load->model('question_model');
        $this->load->model('answer_model');
        $this->load->model('keyword_model');
        $this->load->model('category_model');
    }

    public function _remap() {
        $request_method = $this->input->server('REQUEST_METHOD');
        switch (strtolower($request_method)) {
            case 'get' : $this->get();
                break;
            case 'post': $this->post();
                break;
            default:
                show_error('Unsupported method', 404);
                break;
        }
    }

    public function get() {
        $args = $this->uri->uri_to_assoc(1);
        switch ($args['api']) {
            case 'authenticate' :
                
                if ($this->authlib->isloggedin() !== false) {
                    echo json_encode(array('msg' => 'Relax, You are already Logged In!', 'status' => 0));
                } else {
                    if (!array_key_exists('username', $args) || !array_key_exists('password', $args)) {
                        echo json_encode(array('msg' => 'Invalid arguments!', 'status' => 1));
                        break;
                    }
                    $username = $args['username'];
                    $password = $args['password'];
                    $userdetails = $this->authlib->authenticate($username, $password);
                    if ($userdetails !== false) {
                        $this->session->set_userdata('userdetails', $userdetails);
                        echo json_encode(array('msg' => 'Successful Login!', 'status' => 0));
                    } else {
                        echo json_encode(array('msg' => 'Incorrect User Credentials!', 'status' => 1));
                    }
                }
                break;
                
            case 'logout' :
                
                if ($this->authlib->isloggedin() !== false) {
                    $this->session->sess_destroy();
                    echo json_encode(array('msg' => 'Logout Successful!', 'status' => 1));
                } else {
                    echo json_encode(array('msg' => 'Please login, inorder to logout!', 'status' => 1));
                }
                break;

            case 'question' :
               
                $res = $this->question_model->get($args);
                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {
                    echo json_encode($res);
                }
                break;
                
            case 'answer' :
                
                $res = $this->answer_model->get($args);
                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {
                    echo json_encode($res);
                }
                break;
                
            case 'keyword' :
                
                $res = $this->keyword_model->get($args);
                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {
                    echo json_encode($res);
                }
                break;
                
            case 'category' :
                
                $res = $this->category_model->get($args);
                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {
                    echo json_encode($res);
                }
                break;
                
            case 'search' :
                
                $this->question_model->searchby($args);
                break;

            default:
                show_error('Unsupported resource', 404);
        }
    }

    public function post() {
        $args = $this->uri->uri_to_assoc(1);
        switch ($args['api']) {
            case 'changepassword' :
                
                if ($this->authlib->isloggedin() !== false) {
                    $username = $this->input->post('username');
                    $current_password = $this->input->post('current_password');
                    $new_password = $this->input->post('new_password');
                    $confirm_new_password = $this->input->post('confirm_new_password');

                    $changepassword = $this->authlib->changepassword($username, $current_password, $new_password, $confirm_new_password);
                    if ($changepassword !== false) {
                        echo json_encode(array('msg' => 'Password Changed!', 'status' => 0));
                    } else {
                        echo json_encode(array('msg' => 'Password Change Failed!', 'status' => 1));
                    }
                } else {
                    echo json_encode(array('msg' => 'Access Denied!', 'status' => 1));
                }
                break;
                
            case 'register' :
                
                $firstname = $this->input->post('firstname');
                $lastname = $this->input->post('lastname');
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $confirm_password = $this->input->post('confirm_password');
                $userroleID = $this->input->post('$userroleID');
                $dateofbirth = $this->input->post('dateofbirth');

                $createaccount = $this->authlib->createaccount($firstname, $lastname, $username, $email, $password, $confirm_password, $userroleID, $dateofbirth);
                if ($createaccount !== false) {
                    if (($userdetails = $this->authlib->authenticate($username, $password)) !== false) {
                        $this->session->set_userdata('userdetails', $userdetails);
                        echo json_encode(array('msg' => 'Registration Successful!', 'status' => 0));
                    }
                } else {
                    echo json_encode(array('msg' => 'Registration Failed!', 'status' => 1));
                }
                break;

            case 'question' :
                $this->question_model->action($args);
                break;
            
            case 'answer' :
                $this->answer_model->action($args);
                break;
            
            case 'tag' :
                $this->tag_model->action($args);
                break;
            
            case 'category' :
                $this->category_model->action($args);
                break;

            default:
                show_error('Unsupported resource', 404);
        }
    }

}

?>
