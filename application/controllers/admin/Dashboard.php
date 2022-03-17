<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('product_model');
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


        $data['usercount'] = $this->user_model->activeUserCount();
        $data['purchaseusercount'] = $this->user_model->activepurchaseUserCount();
        $data['activeproduct'] = $this->product_model->activeFindAllCount();
        $data['activeattachproductqty'] = $this->product_model->activeattachproductqty();
        $data['activeattachproductprice'] = $this->product_model->activeattachproductprice();
        $data['userpurchase'] = $this->product_model->userbypurchaseSum();
        

        $this->load->view('admin/dashboard',$data);
    }


    

}

