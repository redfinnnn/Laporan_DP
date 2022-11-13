<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $this->template->load('back/template','back/dashboard');
    }

}

/* End of file Dashboard.php */


?>
