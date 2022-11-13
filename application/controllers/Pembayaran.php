<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function index()
    {
        $data['pembayaran'] = $this->M_pembayaran->get_pembayaran();
        $this->template->load('back/template','back/pembayaran/data_pembayaran',$data);
    }

}

/* End of file Pembayaran.php */
