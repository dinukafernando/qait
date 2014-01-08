<?php

class Question_Model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->model('keyword_model');
        $this->load->model('rating_model');
    }

    public function get($args) {
        //$args = rawurldecode($args);
        $where = array();
        $valid_column_names = array('questionid', 'title', 'categoryid');
        foreach ($valid_column_names as $key) {
            if (isset($args[$key])) {
                $where[$key] = urldecode($args[$key]);
            }
        }
        if (count($where) == 0) {
            return false;
        }

        $this->db->select('question.*, category.name, userdetail.firstname, GROUP_CONCAT(keyword.name) AS tags');
        $this->db->join('category', 'question.categoryid = category.categoryid');
        $this->db->join('userdetail', 'question.userid = userdetail.userid');
        $this->db->join('questionkeyword', 'question.questionid = questionkeyword.questionid');
        $this->db->join('keyword', 'questionkeyword.keywordid = keyword.keywordid');
        $this->db->where($where);
        $this->db->group_by('question.questionid');
        $result = $this->db->get('question');
        $row = $result->row_array();


        $row['rating'] = $this->rating_model->getratingbyquestionid($row['questionid']);

        return $row;
    }

    public function action($args) {
        switch ($args['action']) {
            case 'post' :
                $res = $this->post();
                if ($res === false) {
                    echo json_encode(array('title' => 'Insert Failed!', 'msg' => '', 'status' => 0));
                } else {
                    //echo json_encode($res);
                    echo json_encode(array('title' => 'Question Posted!', 'msg' => '', 'status' => 1));
                }
                break;
            case 'update' :
                $res = $this->update();
                if ($res === false) {
                    echo json_encode(array('title' => 'Update Failed!', 'msg' => 'An error occurred when updating the question!', 'status' => 0));
                } else {
                    //echo json_encode($res);
                    echo json_encode(array('title' => 'Update Successful!', 'msg' => 'The question has been updated successfully!', 'status' => 1));
                }
                break;
            case 'rate' :
                $res = $this->rate();
                if ($res === false) {
                    echo json_encode(array('title' => 'Rating Failed!', 'msg' => 'You have already rated this question!', 'status' => 0));
                } else {
                    //echo json_encode($res);
                    echo json_encode(array('title' => 'Rating Successful!', 'msg' => 'You have successfully rated this question!', 'status' => 1));
                }
                break;
            default:
                show_error('Unsupported resource', 404);
        }
    }

    public function searchby($args) {
        switch ($args['question']) {
            case 'title' :
                $res = $this->searchbytitle($args['s']);
                if ($res === false) {
                    echo json_encode(array('msg' => 'Request Failed!', 'status' => 0));
                } else {
                    echo json_encode($res);
                    //echo json_encode(array('msg' => 'Request Complete!', 'status' => 1));
                }
                break;
            case 'content' :
                $s = $args['s'];
                echo json_encode(array('msg' => $s, 'status' => 1));
                break;
            default:
                show_error('Unsupported resource', 404);
        }
    }

    public function searchbytitle($searchtext) {
        //$textarray = preg_replace('!\s+!', ' ', $searchtext);
        $textarray = explode(' ', rawurldecode($searchtext));
        //var_dump($textarray);
        $this->db->select('question.*, category.name, userdetail.firstname, GROUP_CONCAT(keyword.name) AS tags');
        $this->db->join('category', 'question.categoryid = category.categoryid');
        $this->db->join('userdetail', 'question.userid = userdetail.userid');
        $this->db->join('questionkeyword', 'question.questionid = questionkeyword.questionid');
        $this->db->join('keyword', 'questionkeyword.keywordid = keyword.keywordid');

        for ($i = 0; $i < sizeof($textarray); $i++) {
            $i == 0 ? $this->db->like(array('question.title' => $textarray[$i])) : $this->db->or_like(array('question.title' => $textarray[$i]));
        }

        $this->db->group_by('question.questionid');
        $result = $this->db->get('question');
        $resultarray = $result->result_array();
        return $resultarray;
    }

    public function post() {
        $this->userdetails = $this->session->userdata('userdetails');

        $title = urldecode($this->input->post('title'));
        $content = urldecode($this->input->post('body'));
        $userid = $this->userdetails['userdetail']['userid'];
        $categoryid = urldecode($this->input->post('category'));
        $post_keywords = explode(',', urldecode($this->input->post('keywords')));
        //var_dump($post_keywords);
        $keywords = $this->keyword_model->get(null);

        $all_keywords = array();
        foreach ($keywords as $keyword) {
            $all_keywords[] .= $keyword['name'];
        }

        $new_keywords = array_diff($post_keywords, $all_keywords);

        foreach ($new_keywords as $new_keyword) {
            $this->db->set('name', $new_keyword);
            $this->db->insert('keyword');
        }

        $insertdata_1 = array(
            'title' => $title,
            'content' => $content,
            'userid' => $userid,
            'edituserid' => $userid,
            'categoryid' => $categoryid,
            'posteddate' => Date('Y-m-d'),
            'lastupdateddate' => Date('Y-m-d')
        );
        $this->db->insert('question', $insertdata_1);
        $questionid = $this->db->insert_id();

        $updated_keywords = $this->keyword_model->get(null);
        foreach ($updated_keywords as $val) {
            if (in_array($val['name'], $post_keywords)) {
                $this->db->set('questionid', $questionid);
                $this->db->set('keywordid', $val['keywordID']);
                $this->db->insert('questionkeyword');
            }
        }
        //var_dump($post_keywords);
        return true;
    }
    
    public function update() {
        $this->userdetails = $this->session->userdata('userdetails');
        $questionid = urldecode($this->input->post('questionid'));
        $title = urldecode($this->input->post('title'));
        $content = urldecode($this->input->post('body'));
        $userid = $this->userdetails['userdetail']['userid'];
        $post_keywords = explode(',', urldecode($this->input->post('keywords')));
        
        $this->db->where('questionid', $questionid);
        $this->db->delete('questionkeyword'); 
        $keywords = $this->keyword_model->get(null);

        $all_keywords = array();
        foreach ($keywords as $keyword) {
            $all_keywords[] .= $keyword['name'];
        }

        $new_keywords = array_diff($post_keywords, $all_keywords);

        foreach ($new_keywords as $new_keyword) {
            $this->db->set('name', $new_keyword);
            $this->db->insert('keyword');
        }

        $insertdata = array(
            'title' => $title,
            'content' => $content,
            'edituserid' => $userid,
            'lastupdateddate' => Date('Y-m-d')
        );
        $this->db->where('questionid', $questionid);
        $this->db->update('question', $insertdata);

        $updated_keywords = $this->keyword_model->get(null);
        foreach ($updated_keywords as $val) {
            if (in_array($val['name'], $post_keywords)) {
                $this->db->set('questionid', $questionid);
                $this->db->set('keywordid', $val['keywordID']);
                $this->db->insert('questionkeyword');
            }
        }
        //var_dump($post_keywords);
        return true;
    }

    public function rate() {
        try {
            $this->userdetails = $this->session->userdata('userdetails');
            $questionid = urldecode($this->input->post('questionid'));
            $rateamount = urldecode($this->input->post('rateamount'));
            $userid = $this->userdetails['userdetail']['userid'];
            $array = array('questionid' => $questionid, 'userid' => $userid);
            
            $insertdata = array(
                'questionid' => $questionid,
                'rateamount' => $rateamount,
                'userid' => $userid,
                'ratedate' => Date('Y-m-d')
            );
      
            return $this->checkifuserrated($array) == true ? false : $this->db->insert('questionrating', $insertdata);
            
        } catch (Exception $e) {
            return false;
        }        
    }

    function checkifuserrated($array) {
        $this->db->where($array);
        $query = $this->db->get('questionrating');
        //echo $query->num_rows();
        return $query->num_rows() > 0 ? true : false;
    }

}

?>
