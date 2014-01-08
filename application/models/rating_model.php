<?php

class Rating_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getratingbyquestionid($questionid) {
        $this->db->select('SUM(questionrating.rateamount) AS rating');
        $this->db->where('questionrating.questionid', $questionid); 
        $result = $this->db->get('questionrating');
        $row = $result->row_array();
        return ($row['rating'] != null) ? $row['rating'] : 0;
    }

}

?>
