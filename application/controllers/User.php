<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {
        $data['user'] = $this->M_user->get_user();
        $this->template->load('back/template','back/tabel/data_user',$data);
    }
    
    

}

/* End of file User.php */
