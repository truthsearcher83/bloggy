<?php

class Category_model extends CI_Model {
    public function get_category($slug=NULL){
            if(!$slug){
            $this->db->order_by('category_name','ASC');
            $query=$this->db->get('category');
            return $query->result_array();
            } else {
            $this->db->select('category.id as id ,category.category_name as category_name');
            $this->db->order_by('category_name','ASC');
            $this->db->where('posts.slug',$slug);
            $this->db->join('category' , 'category.id=posts.category_id');
            $query=$this->db->get('posts');
            return $query->result_array();   
            }
    }
    public function create_category($data){
            $this->db->insert('category',$data);
    }
    public function posts_in_category($id){
            
        $this->db->select('posts.id as id ,posts.created_on as created_on,
                         posts.title as title,posts.post_image as post_image ,posts.body as body,
                         posts.slug as slug , category.category_name as category_name');
        $this->db->where('posts.category_id',$id);
        $this->db->join('posts' , 'posts.category_id=category.id');
        $query=$this->db->get('category');
         return $query->result_array();
    } 
    public function category_name($id){
        $this->db->where('id' , $id);
        $query=$this->db->get('category');
        return $query->row_array();  
    }
     public function delete($id){
             $this->db->where(['id'=>$id]);
             $this->db->delete('category');
     }
}

