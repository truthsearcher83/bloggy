<?php

class Category extends CI_Controller {  
     public function __construct(){
        parent::__construct();
        if(!$this->session->userdata("logged_in")){
            $this->session->set_flashdata('login_failure','You are not authorized ');
            redirect();
        }
    }
    
    public function index(){
        $data['title']='All Categories';
        $category=$this->category_model->get_category();
        $data['category']=$category;
        $this->load->view('templates/header');
        $this->load->view('category/index',$data);
        $this->load->view('templates/footer');
    }
    public function create () {
      $data['title']='New Category';
           $this->form_validation->set_rules('category_name', 'Category Name','trim|required|min_length[5]|max_length[128]');
           if($this->form_validation->run()==FALSE){
              $data['errors']=validation_errors();
              $this->load->view('templates/header');
              $this->load->view('category/create', $data);
              $this->load->view('templates/footer');   
           }else {
                $category_name=$this->input->post('category_name');
                $this->category_model->create_category([
                        'category_name'=>$category_name,
                        'user_id'=>$this->session->userdata('user_id')
                        ]);
                $this->session->set_flashdata('category_created','Category Created ');
                redirect('category');
                }
           }
    public function posts_in_category($id) {
        $data['category_name']=$this->category_model->category_name($id);
        $posts_in_category=$this->category_model->posts_in_category($id);
        if(!count($posts_in_category)){
            $data['no_posts']=true;
        } else {
            $data['posts_in_category']=$posts_in_category;
        }
        $data['posts_in_category']=$posts_in_category;
        $this->load->view('templates/header');
        $this->load->view('category/posts',$data);
        $this->load->view('templates/footer');
    }
      public function delete($id){
             $this->category_model->delete($id);
             $this->session->set_flashdata('category_deleted','Category Deleted ');
             redirect('category');
    }
}
    

