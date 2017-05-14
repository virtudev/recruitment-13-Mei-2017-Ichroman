<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restinput_m extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function insert_db($data) {
            $this->db->insert('request', $data);
        }

}
