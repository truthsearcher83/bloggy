<?php

class Post_model extends CI_Model {
   public function get_post($slug = FALSE ,$limit = FALSE , $offset = FALSE ){
       if($limit){
           $this->db->limit($limit , $offset);
       }
       
       if($slug===FALSE) {
         $this->db->order_by('posts.id', 'DESC');
         $this->db->join('category' , 'category.id=posts.category_id');
         $query = $this->db->get('posts');  
         return $query->result_array();
      } else {
         $this->db->select('posts.id as id ,posts.category_id as category_id ,posts.created_on as created_on,
                         posts.title as title,posts.post_image as post_image ,posts.body as body,
                         posts.slug as slug ,posts.user_id as user_id ,category.category_name as category_name');      
         $this->db->where('slug',$slug);
         $this->db->order_by('posts.id', 'DESC');
         $this->db->join('category' , 'category.id=posts.category_id');
         $query = $this->db->get("posts");
         return $query->row_array(); 
      }
   }
   public function create_post($data){
       $this->db->insert('posts',$data);
   }
   public function update_post($data,$id) {
        $this->db->where(['id'=>$id]);
        $this->db->update('posts',$data);
        
    }
    public function get_category(){
        $this->db->order_by('category_name','ASC');
        $query=$this->db->get('category');
        return $query->result_array();
    }
    public function delete($id){
             $this->db->where(['id'=>$id]);
             $this->db->delete('posts');
    }
}

