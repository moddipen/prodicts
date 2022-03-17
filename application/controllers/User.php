<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function  __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
        //$this->load->helper('form');
    }

	public function index()
	{
        $this->load->view('landing');
	}

    public function login()
    {
        $this->form_validation->set_rules("user_email","Email Address",'required|valid_email');
        $this->form_validation->set_rules("user_password","Password",'required|min_length[8]');

        if($this->form_validation->run())
        {
            $result = $this->user_model->can_login($this->input->post('user_email'),$this->input->post('user_password'));
            
            if($result == ''){
                if($this->session->userdata('role')=='admin'){
                    redirect('admin/dashboard');
                }else {
                    redirect('product');
                }
                
            } else {
                $this->session->set_flashdata('message',$result);
                redirect('user');
            }
        } else {
            $this->index();
        }
    }

    public function register(){ 
        $this->load->view('register');
    }  

    public function validation(){

        $this->form_validation->set_rules("user_email","Email Address",'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules("user_password","Password",'required|min_length[8]');

        if($this->form_validation->run()){
            
            $verification_key = md5(rand());
            $encrypt_password = md5($this->input->post('user_password'));
            $data = array(
                'email' => $this->input->post('user_email'),
                'password' => $encrypt_password,
                'verification_key' => $verification_key,
                'isVerified' =>0,
                'role' =>'user'
            );
            $id = $this->user_model->insert($data);

            // Email Sent Code Start
            if($id  > 0 ){
                $subject = "Please verify email for login";
                $message = "
                <p>Hi,</p>
                <a href='".base_url()."user/verify_email/".$verification_key."'>Verification Link</a>
                ";
                
                $config = Array(
                  'protocol' => 'smtp',
                  'smtp_host' => 'ssl://smtp.googlemail.com',
                  'smtp_port' => 465,
                  'smtp_user' => 'teknomins9@gmail.com', // change it to yours
                  'smtp_pass' => 'tekno@123', // change it to yours
                  'mailtype' => 'html',
                  'charset' => 'iso-8859-1',
                  'wordwrap' => TRUE
                );
                
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('teknomins9@gmail.com'); // change it to yours
      $this->email->to($this->input->post('user_email'));// change it to yours
      $this->email->subject($subject);
      $this->email->message($message);
      if($this->email->send())
     {
        $this->session->set_flashdata('message','Please check your mail');
        redirect('user'); 
      
     }
     else
    {
     show_error($this->email->print_debugger());
    }


            
            }

             
        } else {
            
            $this->register();
        }
        
    }

    public function verify_email(){

        if($this->uri->segment(3)){

            $verification_key = $this->uri->segment(3);
            if($this->user_model->verify_email($verification_key)){

                $data['message'] = "<a href ='".base_url()."/user'>Login Here</a>";
            }else{
                $data['message'] = "Invalid Link";
            }
            $this->load->view('email_verification',$data);
        } 
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