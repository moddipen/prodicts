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
                redirect('product');
            }

        }

    }

    function index(){
        $this->load->view('dashboard');
    }


    function logout()
    {
        $data = $this->session->all_userdata();
        foreach($data as $row => $rows_value){
            $this->session->unset_userdata($row);
        }
        redirect('user');
    }

}

