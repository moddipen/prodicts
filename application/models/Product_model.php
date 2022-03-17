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

    public function activeFindAllCount(){
        $this->db->where('status','active');
        return $this->db->get('products')->num_rows();

    }

    public function activeattachproductqty(){

        $this->db->select_sum('qty');
        $query = $this->db->get('userpurchase')->row();
        return $query->qty;
    }

    public function activeattachproductprice(){

        $this->db->select_sum('price');
        $query = $this->db->get('userpurchase')->row();
        return $query->price;
    }


    public function userbypurchaseSum(){
        $this->db->select('user_id, SUM(price) AS price', FALSE);
        $this->db->group_by("user_id");
        return $this->db->get('userpurchase')->result();

        // $this->db->select_sum('price');
        // $query = $this->db->get('userpurchase')->row();
        // return $query->price;
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