<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    function get_user() 
    {

        return $this->db->get('user')->result();
    }

}

/* End of file M_user.php */
