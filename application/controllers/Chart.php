<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['jumlah_cash']=$this->M_pembayaran->jumlah_cash();
        $data['jumlah_cash_admin']=$this->M_pembayaran->jumlah_cash_admin();
        $data['jumlah_atm']=$this->M_pembayaran->jumlah_atm();
        $data['jumlah_third']=$this->M_pembayaran->jumlah_third();
        $data['jumlah_transfer']=$this->M_pembayaran->jumlah_transfer();

        $data['sum_cash']=$this->M_pembayaran->jumlah_cash()*200;
        $data['sum_cash_admin']=$this->M_pembayaran->jumlah_cash_admin()*500;
        $data['sum_atm']=$this->M_pembayaran->jumlah_atm()*2500;
        $data['sum_third']=$this->M_pembayaran->jumlah_third()*5000;
        $data['sum_transfer']=$this->M_pembayaran->jumlah_transfer()*750;
        
        $this->template->load('back/template','back/chart/chart',$data);
    }

    
}

/* End of file Chart.php */
