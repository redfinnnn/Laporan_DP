<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

    function get_pembayaran() 
    {
        return $this->db->get('data_pembayaran')->result();
    }

    function jumlah_cash()
    {
        $this->db->select('metode_bayar');
        $this->db->from('data_pembayaran');
        $this->db->where('metode_bayar','Cash');
        return $this->db->get()->num_rows();
    }

    function jumlah_cash_admin()
    {
        $this->db->select('metode_bayar');
        $this->db->from('data_pembayaran');
        $this->db->where('metode_bayar','Cash Admin Coll');
        return $this->db->get()->num_rows();
    }

    function jumlah_atm()
    {
        $this->db->select('metode_bayar');
        $this->db->from('data_pembayaran');
        $this->db->where('metode_bayar','ATM PAYMENT');
        return $this->db->get()->num_rows();
    }

    function jumlah_third()
    {
        $this->db->select('metode_bayar');
        $this->db->from('data_pembayaran');
        $this->db->where('metode_bayar','Third Party Cash Payment');
        return $this->db->get()->num_rows();
    }

    function jumlah_transfer()
    {
        $this->db->select('metode_bayar');
        $this->db->from('data_pembayaran');
        $this->db->where('metode_bayar','Transfer');
        return $this->db->get()->num_rows();
    }

    
}

/* End of file M_pembayaran.php */
