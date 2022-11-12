<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    function get_user() 
    {
        return $this->db->get('user')->result();
    }

    function insert($data)
    {
        $this->db->insert('user', $data);   
    }

    function get_id_user($id)
    {
        $this->db->where('id_user',$id);
        return $this->db->get('user')->row();
    }

    function update($id,$data)
    {
        $this->db->where('id_user',$id);
        $this->db->update('user',$data);
    }

    function delete($id)
    {
        $this->db->where('id_user',$id);
        $this->db->delete('user');
    }
}

/* End of file M_user.php */
