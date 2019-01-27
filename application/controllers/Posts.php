

<?php
class Posts extends CI_Controller {  
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata("logged_in")){
            $this->session->set_flashdata('login_failure','You are not authorized ');
            redirect();
        }
    }
    public function index($offset=0){
        
        //pagination config
        $this->load->library('pagination');
        $config['base_url'] = base_url().'posts/index/';
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 3;
        $config['uri_segment']=3;
        $config['attributes'] = array('class' => 'pagination-link');

        $this->pagination->initialize($config);
        
        $data['title']='Latest Posts';
        $posts=$this->post_model->get_post(FALSE , $config['per_page'] ,$offset);
        $data['posts']=$posts;
        $this->load->view('templates/header');
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer');
    }
    public function view($slug){
        $post=$this->post_model->get_post($slug);
        $data['comments']=$this->comment_model->get_comments($post['id']);
        if(empty($post)){
            show_404();
        } else {
           $data['post']=$post;
           $this->load->view('templates/header');
           $this->load->view('posts/view',$data);
           $this->load->view('/templates/footer');
        }   
    }
    public function create(){
           $data['title']='New Post';
           $this->form_validation->set_rules('title', 'Title','trim|required|min_length[5]|max_length[128]');
           $this->form_validation->set_rules('body', 'Blog','trim|required|min_length[5]');
           if($this->form_validation->run()==FALSE){
              $data['categories'] = $this->post_model->get_category();
              $data['errors']=validation_errors();
              $this->load->view('templates/header');
              $this->load->view('posts/create', $data);
              $this->load->view('templates/footer');   
           }else{
                  // Upload Image
                $config['upload_path'] = './asset/images/posts';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload()){
                        $errors = array('error' => $this->upload->display_errors());  
                        $post_image = 'noimage.jpg';
                } else {
                        $data = array('upload_data' => $this->upload->data()); // uploads the file
                        $post_image = $_FILES['userfile']['name'];
                }

                 // end image upload

                $title=$this->input->post('title');
                $body=$this->input->post('body');
                $category_id=$this->input->post('category');
                $slug= url_title($title);
                $user_id=$this->session->userdata('user_id');
                $this->post_model->create_post([
                        'title'=>$title,
                        'body'=>$body,
                        'slug'=>$slug,
                        'category_id'=>$category_id ,
                        'post_image'=>$post_image ,
                        'user_id'=>$user_id
                        ]);
                $this->session->set_flashdata('post_created','Post Created ');

                 redirect('posts');
                }
    }
    public function delete($id){
             $this->session->set_flashdata('post_deleted','Post Deleted ');
             redirect('posts');
    }
    public function edit($slug){
            $post=$this->post_model->get_post($slug);
            $categories=$this->category_model->get_category();
            if(empty($post)){
            show_404();
        } else {
            
           // Another user trying to access the url throw her out 
           $data['title']='Edit Post';
           $data['post']=$post;
           if ($this->session->userdata('user_id')!= $post['user_id']){
               redirect('posts');
           }
           $data['categories']=$categories;
           $this->load->view('templates/header');
           $this->load->view('posts/edit',$data);
           $this->load->view('/templates/footer');
        } 
    }
    public function update(){
       
        $this->form_validation->set_rules('title', 'Title','trim|required|min_length[5]|max_length[128]');
        $this->form_validation->set_rules('body', 'Blog','trim|required|min_length[5]');
        if($this->form_validation->run()==FALSE){
            $slug=$this->input->post('slug');
            $posts=$this->post_model->get_post($slug);
            $categories=$this->category_model->get_category($slug);  
            $data['errors']=validation_errors();
            $data['title']='Edit Post';
            $data['posts']=$posts;
            $data['categories']=$categories;
            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');   
           }else{
                // Upload Image
                $config['upload_path'] = './asset/images/posts';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload()){
                        $errors = array('error' => $this->upload->display_errors());
                        $post_image = 'noimage.jpg';
                } else {
                        $data = array('upload_data' => $this->upload->data());
                        $post_image = $_FILES['userfile']['name'];
                        
                }
                 // end image upload
              $category_id=$this->input->post('category');
              $id=$this->input->post('id');
              $title=$this->input->post('title');
              $body=$this->input->post('body');
              $slug= url_title($title);
              ($this->post_model->update_post([
                      'title'=>$title,
                      'body'=>$body,
                      'slug'=>$slug ,
                      'category_id'=>$category_id ,
                      'post_image'=>$post_image
                      ],$id));
              $this->session->set_flashdata('post_updated','Post Updated ');
              redirect('posts');     
                }
    }
}

