<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userproduct extends CI_Controller {
    
    public function  __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('product_model');
        if(!$this->session->userdata('id'))
        {
            redirect('user');
        } else {
            if($this->session->userdata('role') != 'user'){
                redirect('admin/dashboard');
            }

        }
    
    }

    public function index(){
        $data['products'] = $this->product_model->activeFindAll();


        $this->load->view('userproduct',$data);
       
    }

    public function buyproduct(){

        $data = array(
            'user_id' => $this->input->post('user_id'),
            'product_id' => $this->input->post('product_id'),
            'qty' => $this->input->post('qty_buy'),
            'price' => $this->input->post('qty_buy') * $this->input->post('product_price'),
        );
        if($this->product_model->buyProducts($data)){
            redirect('userproduct/mypurchase');
        }
    }

    public function mypurchase(){
        $data['mypurchace'] = $this->product_model->mypurchase();


        $this->load->view('userpurchace',$data);
    }


}
