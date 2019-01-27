<?php

class Comments extends CI_Controller {
    public function add($post_id){
        $this->form_validation->set_rules('name','Name','trim|required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('comment_body','Comment','trim|required|min_length[5]|max_length[120]');
        if($this->form_validation->run()==FALSE){
                $slug=$this->input->post('slug');
                $data['post']=$this->post_model->get_post($slug);
                $data['comments']=$this->comment_model->get_comments($data['post']['id']);
                $this->load->view('templates/header');
                $this->load->view('posts/view' , $data);
                $this->load->view('templates/footer');
        } else {
                $data['name']=$this->input->post('name');
                $data['email']=$this->input->post('email');
                $data['comment_body']=$this->input->post('comment_body'); 
                $this->comment_model->add($data,$post_id);
                redirect('posts/view/'.$this->input->post('slug'));
        }
    }
   
}

