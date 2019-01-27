<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function view($page = 'home'){
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404(); /* if this not there a different An Error Was Encountered page shows
                             but with this 404 error shows */
        } 
        else {
            $data['title']=ucfirst($page);
            $this->load->view('templates/header');
            $this->load->view('/pages/'.$page,$data);
            $this->load->view('/templates/footer');
        }
    }
}
