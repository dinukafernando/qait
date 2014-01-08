<?php

class Answer_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get($args) {
        $where = array();
        $valid_column_names = array('answerid', 'content', 'postdate', 'userid', 'questionid');
        foreach ($valid_column_names as $key) {
            if (isset($args[$key])) {
                $where['answer.' . $key] = urldecode($args[$key]);
            }
        }
        if (count($where) == 0) {
            return false;
        }
//        $this->db->where($where);
//        $result = $this->db->get('answer');
        $this->db->select('answer.*, userdetail.firstname, SUM(answerrating.rateamount) AS rating');
        $this->db->join('userdetail', 'answer.userid = userdetail.userid');
        $this->db->join('answerrating', 'answer.answerid = answerrating.answerid', 'LEFT');
        $this->db->where($where);
        $this->db->group_by('answer.answerid');
        $result = $this->db->get('answer');
        return $result->result_array();
    }

    public function action($args) {
        switch ($args['action']) {
            case 'post' :
                $res = $this->postanswer();
                if ($res === false) {
                    echo json_encode(array('msg' => 'Insert Failed!', 'status' => 0));
                } else {
                    //echo json_encode($res);
                    echo json_encode(array('msg' => 'Answer Posted!', 'status' => 1));
                }
                break;
            case 'rate' :
                $res = $this->rate();
                if ($res === false) {
                    echo json_encode(array('title' => 'Rating Failed!', 'msg' => 'You have already rated this answer!', 'status' => 0));
                } else {
                    //echo json_encode($res);
                    echo json_encode(array('title' => 'Rating Successful!', 'msg' => 'You have successfully rated this answer!', 'status' => 1));
                }
                break;
            default:
                show_error('Unsupported resource', 404);
        }
    }

    public function postanswer() {
        $content = urldecode($this->input->post('content'));
        $questionid = urldecode($this->input->post('questionid'));
        $this->userdetails = $this->session->userdata('userdetails');
        $userid = $this->userdetails['userdetail']['userid'];

        $insertdata_1 = array(
            'content' => $content,
            'postdate' => Date('Y-m-d'),
            'lastupdatedate' => Date('Y-m-d'),
            'userid' => $userid,
            'questionid' => $questionid
        );
        $this->db->insert('answer', $insertdata_1);

        return true;
    }
    
    public function rate() {
        try {
            $this->userdetails = $this->session->userdata('userdetails');
            $answerid = urldecode($this->input->post('answerid'));
            $rateamount = urldecode($this->input->post('rateamount'));
            $userid = $this->userdetails['userdetail']['userid'];
            $array = array('answerid' => $answerid, 'userid' => $userid);
            
            $insertdata = array(
                'answerid' => $answerid,
                'rateamount' => $rateamount,
                'userid' => $userid,
                'ratedate' => Date('Y-m-d')
            );
      
            return $this->checkifuserrated($array) == true ? false : $this->db->insert('answerrating', $insertdata);
            
        } catch (Exception $e) {
            return false;
        }        
    }
    
    function checkifuserrated($array) {
        $this->db->where($array);
        $query = $this->db->get('answerrating');
        //echo $query->num_rows();
        return $query->num_rows() > 0 ? true : false;
    }

}

?>
