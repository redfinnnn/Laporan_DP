<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        
    }
    
    function login()
    {
        $this->load->view('back/login');   
    }

    function proses_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $this->form_validation->set_message('required','{field} harus di isi');
        $this->form_validation->set_message('required','{field} harus di isi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

        
        if ($this->form_validation->run() == TRUE) 
        {
            $user = $this->M_auth->get_email($this->input->post('email'));
            if(!$user){
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Username atau Password salah</div>');
                redirect('auth/login','refresh');
                
            }
        
            
            else if (!password_verify($this->input->post('password'), $user->password)) 
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Password yang anda masukan salah</div>');
                redirect('auth/login','refresh');
            }
            else if($user->level_user== 0 ) //level_user=0 adalah admin
            {
                $session = array
                (
                'id_user'    => $user->id_user,
                'username'   => $user->username,
                'email'      => $user->email,
                'level_user' => $user->level_user
                );
                
                
                $this->session->set_userdata($session);
                //$this->session->set_flashdata('message', '<div class="alert alert-danger">Selamat datang <b></b></div>');
                redirect('dashboard','refresh');

            }
            else{
                $session = array
                (
                'id_user'    => $user->id_user,
                'username'   => $user->username,
                'email'      => $user->email,
                'level_user' => $user->level_user
                );
                
                
                $this->session->set_userdata($session);
                //$this->session->set_flashdata('message', '<div class="alert alert-danger">Selamat datang <b></b></div>');
                redirect('dashboard','refresh');

            }
        }
        else 
        {
            $data['title'] = 'Login Pages';
            $this->load->view('back/login', $data);
            //$this->load->view('back/login');
        }   
    }

    function logout()
    {
        $this->session->sess_destroy();
        
        //$this->session->set_flashdata('message', '<div class="alert alert-success">Anda berhasil logout</div>');
        
        redirect('auth/login');
        
    }
}


/* End of file Auth.php */

?>