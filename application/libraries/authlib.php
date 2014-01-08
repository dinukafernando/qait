<?php

class Authlib {
 
    function __construct() {
        // Get CI instance
        $this->ci = &get_instance();   
        
        // Load User model
        $this->ci->load->model('user_model');
    }
 
    public function createaccount($firstname, $lastname, $username, $email, $password, $confirm_password, $userroleID, $dateofbirth) {    
        
        // Check for missing fields
        if ($firstname == '' || $lastname == '' || $username == '' || $email == '' || $password == '' || $confirm_password == '') {
            return false;
        }
        
        // Check whether password and confirm password matches
        if ($password != $confirm_password) {
            return false;
        }
        
        return $this->ci->user_model->createaccount($firstname, $lastname, $username, $email, $password, $userroleID);
    } 
    
    public function authenticate($username, $password) {
        // Check for missing fields
        if ($username == '' || $password == '') {
            return false;
        }
        
        return $this->ci->user_model->authenticate($username, $password);
    }
    
    public function isloggedin() {
        return $this->ci->user_model->isloggedin();
    }
    
    public function changepassword($username, $current_password, $new_password, $confirm__new_password) {               
        // Check for missing fields
        if ($username == '' || $current_password == '' || $new_password == '' || $confirm__new_password == '') {
            return false;
        }
        
        // Check if current passowrd and new password are not equal
        if ($current_password == $new_password) {
            return false;
        }
        
        // // Check whether password and confirm password matches
        if ($new_password != $confirm__new_password) {
            return false;
        }
        
        return $this->ci->user_model->changepassword($username, $current_password, $new_password);
    }
    
}

?>
