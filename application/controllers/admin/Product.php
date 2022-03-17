<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    
    public function  __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('product_model');
        if(!$this->session->userdata('id'))
        {
            redirect('user');
        } else {
            if($this->session->userdata('role') != 'admin'){
                redirect('product');
            }

        }
    
    }

    public function index(){
        $data['products'] = $this->product_model->findAll();


       $this->load->view('admin/product/index',$data);
    }


    public function findall()
    {
       echo json_encode($this->product_model->findAll());
     }
}

?>