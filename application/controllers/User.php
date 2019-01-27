<?php

class User extends CI_Controller {
    public function register(){
        $data['title']='Register Here';
        $this->form_validation->set_rules('name' , 'Name' , 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('user_name' , 'Username' , 'trim|required|max_length[32]|callback_check_username_exists'); // or is_unique[users.username]
        $this->form_validation->set_rules('password', 'Password','trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password','trim|required|min_length[5]|max_length[12]|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique'=>'Email Already Used'));
        if ($this->form_validation->run()==FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register',$data);
                $this->load->view('templates/footer');  
        } else {
                  $option=array('cost'=>12);
                  $encrypt_password=password_hash($this->input->post('password'),PASSWORD_BCRYPT,$option);
                  $this->user_model->add_user($encrypt_password);
                  $this->session->set_flashdata('user_registered','You are Successfully Registered and can Log in ');
                  redirect('user/login');
        }
    }
     public function login(){
        if($this->session->userdata('logged_in')){
                redirect('posts');
        } else {
            $data['title']='Login';
            $this->form_validation->set_rules('user_name' , 'Username' , 'trim|required|max_length[32]'); 
            $this->form_validation->set_rules('password', 'Password','trim|required|min_length[5]|max_length[12]');
            if ($this->form_validation->run()==FALSE){
                    $this->load->view('templates/header');
                    $this->load->view('users/login',$data);
                    $this->load->view('templates/footer'); 
            } else {
                    $username=$this->input->post('user_name');
                    $password=$this->input->post('password');
                    $user_id=$this->user_model->login_user($username , $password);
                        if($user_id){
                                    $user_data=array(
                                    'user_id'=>$user_id,
                                    'username'=>$username,
                                    'logged_in'=>true);
                                    $this->session->set_userdata($user_data);
                                    $this->session->set_flashdata('login_success','Logged In Successfully');
                                    redirect('posts');
                        }else{
                    $this->session->set_flashdata('login_failure','Log in Failure');
                    redirect('user/login');
                }
            }
        }
     }
     public function logoff(){
         $this->session->sess_destroy();
         redirect();
     }
    
    
    // call back function for rule to check unique user name 
    public function check_username_exists($username){
       $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
       if($this->user_model->check_username_exists($username)){
               return false;
       } else {    
               return true;
       }
              }
}

