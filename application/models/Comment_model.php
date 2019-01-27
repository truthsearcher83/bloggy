<?php

class Comment_model extends CI_Model{
    public function add($data,$post_id){
        $data['post_id']=$post_id;
        $this->db->insert('comments', $data);      
    }
     public function get_comments($post_id){
        $this->db->where('post_id',$post_id);
        $query= $this->db->get('comments');
        return $query->result_array();
    }

}