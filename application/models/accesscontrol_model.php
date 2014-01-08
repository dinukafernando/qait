<?php

class Answer_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function checkuserrole($args) {
        try {
            if ($args['usergroupid'] == null) {
                $args['usergroupid'] = 1;
            }
            $this->db->where(array('usergroupid' => $args['usergroupid'], 'userpermissionid' => $args['pageid']));
            $query = $this->db->get('usergrouppermission');
            if ($query->num_rows() != 1) {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

}


$access = $this->apicurl->executecurlrequest(base_url().'api/useraccess/usergroupid/'.rawurlencode($this->userdetails['user']['usergroupid']).'/pageid/6');

