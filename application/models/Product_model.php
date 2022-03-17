<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function findAll(){
        
        return $this->db->get('products')->result();

    }

    public function activeFindAll(){
        $this->db->where('status','active');
        return $this->db->get('products')->result();

    }

    public function buyProducts($data){
       
        $this->db->select('qty');
        $this->db->where('id',$data['product_id']);
        $qyuery =  $this->db->get('products')->result();
        
        $qty = array(
            'qty' => $qyuery[0]->qty - $data['qty'],
        );
        $this->db->where('id', $data['product_id']);
        $this->db->update('products',$qty);
        $this->db->insert('userpurchase', $data);
        return true;


    }

    public function mypurchase(){
        $this->db->where('user_id',$this->session->userdata('id'));
        return $this->db->get('userpurchase')->result();

    }

    


}