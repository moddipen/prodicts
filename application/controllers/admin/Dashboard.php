<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct(){
        parent::__construct();

        if(!$this->session->userdata('id'))
        {
            redirect('user');
        } else {
            if($this->session->userdata('role') != 'admin'){
                redirect('userproduct');
            }

        }

    }

    function index(){
        $this->load->view('admin/dashboard');
    }


    

}

