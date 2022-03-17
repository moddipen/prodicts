<?php 
class User_model extends CI_Model
{
    function insert($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    function verify_email($key){
        $this->db->where('verification_key',$key);
        $this->db->where('isVerified',0);
        $query = $this->db->get('users');
        if($query->num_rows()>0){
            $data = array(
                'isVerified' => 1
            );
            $this->db->where('verification_key', $key);
            $this->db->update('users',$data);
            return true;
        } else{
            return false;
        }
    }


    function can_login($email,$password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if($query->num_rows()>0){
            
            foreach ($query->result() as $row)
            if($row->isVerified == '1')
            {
                $store_password = md5($password);
                
                if($store_password == $row->password)
                {
                    $this->session->set_userdata('id',$row->id);
                    $this->session->set_userdata('role',$row->role);
                } else{
                    return "Wrong Password";
                }
            } else {
                return 'Email address not verified';
            }

        } else {
            return 'Wrong Email Address';
        }
    }


}

?>