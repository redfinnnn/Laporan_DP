<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    // public $id = 'id_user';

    // function insert($data)
    // {
    //     $this->db->insert('user', $data);      
    // }
    function get_user($user)
    {
        $this->db->where('username', $user);
        return $this->db->get('user')->row();
    }
    

}

/* End of file M_auth.php */
