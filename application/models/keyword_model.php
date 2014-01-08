<?php
class Keyword_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get($args) {
        $where = array();       
        $valid_column_names = array('keywordid', 'name');
        foreach ($valid_column_names as $key) {
            if (isset($args[$key])) {
                $where[$key] = $args[$key];
            }
        }
//        if (count($where) == 0) { 
//            return false;
//        }
        $this->db->where($where);
        $result = $this->db->get('keyword');
        return $result->result_array();
    }
    
      public function action($args) {
        switch ($args['action']) {
            case 'post' :
                $res = $this->postkeyword();
                if ($res === false) {
                    echo json_encode(array('msg' => 'Insert Failed!', 'status' => 0));
                } else {
                    //echo json_encode($res);
                    echo json_encode(array('msg' => 'Keyword Posted!', 'status' => 1));
                }
                break;
            default:
                show_error('Unsupported resource', 404);
        }
    }

    public function postkeyword() {
//        $title = $this->input->post('title');
//        $content = $this->input->post('content');
//        $userid = $this->input->post('userid');
//        $categoryid = $this->input->post('categoryid');
//
//        $insertdata_1 = array(
//            'title' => $title,
//            'content' => $content,
//            'userid' => $userid,
//            'categoryid' => $categoryid,
//            'posteddate' => Date('Y-m-d'),
//            'lastupdateddate' => Date('Y-m-d')
//        );
//        $this->db->insert('question', $insertdata_1);

        return true;
    }

}
?>
