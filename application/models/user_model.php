<?php

class User_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function isloggedin() {
        $sessionid = $this->session->userdata('sessionid');
        $this->db->where(array('sessionid' => $sessionid));
        $query = $this->db->get('userloginsession');

        if ($query->num_rows() == 1) {
            $result_row = $query->row_array();
            return $result_row;
        } else {
            return false;
        }
    }

    function changepassword($username, $current_password, $new_password) {
        $this->db->where(array('username' => $username));
        $query = $this->db->get('user');
        if ($query->num_rows() == 1) {
            $result_row = $query->row_array();

            if ($result_row['password'] == sha1($current_password)) {
                $result_row['password'] = sha1($new_password);
                $this->db->where('username', $username);
                $this->db->update('user', $result_row);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function authenticate($username, $password) {
        $this->db->where(array('username' => $username, 'password' => sha1($password)));
        $query_1 = $this->db->get('user');
        if ($query_1->num_rows() != 1) {
            return false;
        }

        $sessionid = $this->session->userdata('sessionid');
        $result_row_1 = $query_1->row_array();
        $this->db->insert('userloginsession', array('sessionid' => $sessionid, 'userid' => $result_row_1['userID']));

        $this->db->where(array('userid' => $result_row_1['userID']));
        $query_2 = $this->db->get('userdetail');
        if ($query_2->num_rows() == 1) {
            $result_row_2 = $query_2->row_array();
            $userdetails['user'] = $result_row_1;
            $userdetails['userdetail'] = $result_row_2;
        }
        return $userdetails;
    }

    function createaccount($firstname, $lastname, $username, $email, $password, $userroleID, $dateofbirth) {
      
        $this->db->where(array('username' => $username));
        $query_1 = $this->db->get('user');
        if ($query_1->num_rows() > 0) {
            return false; // Username already exists
        }
       
        $hashpassword = sha1($password);
        $insertdata_1 = array(
            'username' => $username,
            'password' => $hashpassword,
            'email' => $email,
            'userRoleID' => $userroleID,
            'datejoined' => Date('Y-m-d'),
            'lastupdateddate' => Date('Y-m-d')
        );
        $this->db->insert('user', $insertdata_1);

        $this->db->where(array('username' => $username));
        $query_2 = $this->db->get('user');
        if ($query_2->num_rows() == 1) {
            $result_row = $query_2->row_array();
            $insertdata_2 = array(
                'userid' => $result_row['userid'],
                'firstname' => $firstname,
                'lastname' => $lastname,
                'dateofbirth' => $dateofbirth
            );
            $this->db->insert('userdetail', $insertdata_2);
        }

        return true;
    }

}

?>
