<?php

class User_model extends CI_Model {
    public function check_username_exists($user_name){
        $this->db->where('username ' ,$user_name);
        $query= $this->db->get('users');
        if ($query->num_rows()==1){
            return true;
        } else 
            return false;
    }
    public function add_user($encrypt_password){
        $this->db->insert('users',[
                'name'=>$this->input->post('name'),
                'password'=>$encrypt_password,
                'username'=>$this->input->post('user_name'),
                'email'=>$this->input->post('email'),
                ]);
    }
    public function login_user($username , $password) {
        $this->db->where([
            'username'=>$username,
         ]);
        $query = $this->db->get("users");
        if($query->num_rows() == 1){
            $db_password=$query->row(0)->password;
            if(password_verify($password,$db_password)){
                return $query->row(0)->id;
            }
        }else{
            return false;
        }
    }
}

