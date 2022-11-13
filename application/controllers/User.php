<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['user'] = $this->M_user->get_user();
        $this->template->load('back/template','back/user/data_user',$data);
    }
    
    function add_user()
    {
        $this->template->load('back/template','back/user/form_user');
    }

    function save_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]|is_unique[user.username]|alpha_numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('level', 'Level User','trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[30]|alpha_numeric');
        $this->form_validation->set_rules('confirm_password', 'Ulangi password', 'trim|required|matches[password]');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('valid_email','{field} anda harus valid');
        $this->form_validation->set_message('is_unique','{field} ini telah terpakai, silahkan gunakan {field} lain');
        $this->form_validation->set_message('min_length','{field} minimal mengandung 5 karakter');
        $this->form_validation->set_message('max_length','{field} maksimal mengandung 30 karakter');
        $this->form_validation->set_message('matches','{field} tidak sama dengan password');
        $this->form_validation->set_message('alpha_numeric','{field} harus menggunakan alpha numeric tanpa spasi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

        
        if ($this->form_validation->run() == TRUE) 
        {
            $data=array(
                'username'=>$this->input->post('username'),
                'email'=>$this->input->post('email'),
                'password'=>password_hash($this->input->post('password'),PASSWORD_BCRYPT),
                'level_user'=> $this->input->post('level'),
            );
            //var_dump($data);
            $this->M_user->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info">User telah berhasil disimpan </div>');
            redirect('user','refresh');
        } 
        else 
        {
            $this->add_user();  
        }
        
    }

    function edit_user($id)
    {
        $data['user']= $this->M_user->get_id_user($id);
        
        if ($data['user']) {
            $this->template->load('back/template','back/user/edit_user',$data);
        }
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data id tidak ditemukan</div>');
            redirect('user','refresh');
        }
       
    }

    function update_user()
    {   
        if ($this->input->post('email')!=$this->input->post('ori_email')) {
            $uniq_email='|is_unique[user.email]';
        }
        else{
            $uniq_email='';
        }
        if ($this->input->post('username')!=$this->input->post('ori_username')) {
            $uniq_username='|is_unique[user.username]';
        }
        else{
            $uniq_username='';
        }
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]|alpha_numeric'.$uniq_username);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'.$uniq_email);
        $this->form_validation->set_rules('level', 'Level User','trim|required');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('valid_email','{field} anda harus valid');
        $this->form_validation->set_message('is_unique','{field} ini telah terpakai, silahkan gunakan {field} lain');
        $this->form_validation->set_message('max_length','{field} maksimal mengandung 30 karakter');
        $this->form_validation->set_message('min_length','{field} minimal mengandung 5 karakter');
        $this->form_validation->set_message('matches','{field} tidak sama dengan password');
        $this->form_validation->set_message('alpha_numeric','{field} harus menggunakan alpha numeric tanpa spasi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

        if ($this->form_validation->run() == TRUE) 
        {
            $data=array(
                'username'=>$this->input->post('username'),
                'email'=>$this->input->post('email'),
                'level_user'=>$this->input->post('level'),
            );
            //var_dump($data);
            $this->M_user->update($this->input->post('id_user'),$data);
            $this->session->set_flashdata('message', '<div class="alert alert-info"> Daftar telah berhasil disimpan </div>');
            redirect('user','refresh');
        } 
        else 
        {
            $this->edit_user($this->input->post('id_user'));
        }
    }
    
    function delete_user($id)
    {
        $delete = $this->M_user->get_id_user($id);

        if($delete){
            $this->M_user->delete($id);
            $this->session->set_flashdata('hapus', '<div class="alert alert-success">Data berhasil dihapus</div>');
            redirect('user','refresh');
        }
        else{
            $this->session->set_flashdata('hapus', '<div class="alert alert-danger">Data tidak ditemukan</div>');
            redirect('user','refresh');
        }
    }

    function profile($id)
    {
        $data['user'] = $this->M_user->get_id_user($id);
        if($data['user']){
            $data['title'] = 'Profil User';
            $this->template->load('back/template','back/profile/profile', $data);
        } else{
            redirect('dashboard','refresh');
        }
    }

    function edit_profile($id)
    {
        $data['user'] = $this->M_user->get_id_user($id);
        if($data['user']){
            $data['title'] = 'Edit Profil User';

            $this->template->load('back/template','back/profile/edit_profile', $data);
        } else{
            redirect('dashboard','refresh');            
        }
    }

    function update_profile()
    {
        if ($this->input->post('email')!=$this->input->post('ori_email')) {
            $uniq_email='|is_unique[user.email]';
        }
        else{
            $uniq_email='';
        }
        if ($this->input->post('username')!=$this->input->post('ori_username')) {
            $uniq_username='|is_unique[user.username]';
        }
        else{
            $uniq_username='';
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]|alpha_numeric'.$uniq_username);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'.$uniq_email);
        $this->form_validation->set_rules('password', 'Password','trim|required');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('valid_email','{field} anda harus valid');
        $this->form_validation->set_message('is_unique','{field} ini telah terpakai, silahkan gunakan {field} lain');
        $this->form_validation->set_message('max_length','{field} maksimal mengandung 30 karakter');
        $this->form_validation->set_message('min_length','{field} minimal mengandung 5 karakter');
        $this->form_validation->set_message('matches','{field} tidak sama dengan password');
        $this->form_validation->set_message('alpha_numeric','{field} harus menggunakan alpha numeric tanpa spasi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

        if ($this->form_validation->run() == TRUE) 
        {
            $user = $this->M_auth->get_user($this->input->post('ori_username'));
            if (!password_verify($this->input->post('password'), $user->password)) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Password tidak sesuai</div>');
                $this->edit_profile($this->input->post('id_user'));
            }
            else{
                $data = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                );
                //var_dump($data);
                $this->M_user->update($this->input->post('id_user'), $data);
                $this->session->set_userdata('username', $this->input->post('username'));
                $this->session->set_userdata('email', $this->input->post('email'));
                $this->session->set_flashdata('message', '<div class="alert alert-info"> Edit profil telah berhasil disimpan </div>');
                $this->profile($this->input->post('id_user'));
            }
            
        } 
        else 
        {
            $this->edit_profile($this->input->post('id_user'));
        }
    }

    function ganti_password($id)
    {
        $data['user'] = $this->M_user->get_id_user($id);
        if($data['user']){
            $data['title'] = 'Edit Profil User';

            $this->template->load('back/template','back/profile/ganti_password', $data);
        } else{
            redirect('dashboard','refresh');            
        }
    }

    function update_password()
    {

        $this->form_validation->set_rules('password_lama', 'Password lama','trim|required');
        $this->form_validation->set_rules('password_baru', 'Password baru', 'trim|required|min_length[5]|max_length[30]|alpha_numeric');
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password','trim|required');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('valid_email','{field} anda harus valid');
        $this->form_validation->set_message('is_unique','{field} ini telah terpakai, silahkan gunakan {field} lain');
        $this->form_validation->set_message('max_length','{field} maksimal mengandung 30 karakter');
        $this->form_validation->set_message('min_length','{field} minimal mengandung 5 karakter');
        $this->form_validation->set_message('matches','{field} tidak sama dengan password');
        $this->form_validation->set_message('alpha_numeric','{field} harus menggunakan alpha numeric tanpa spasi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

        if ($this->form_validation->run() == TRUE) 
        {
            $user = $this->M_auth->get_user($this->input->post('username'));
            if (!password_verify($this->input->post('password_lama'), $user->password)) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Password tidak sesuai</div>');
                $this->ganti_password($this->input->post('id_user'));
            }
            else{
                $data = array(
                    'password'=>password_hash($this->input->post('password_baru'),PASSWORD_BCRYPT),
                );            
                $this->M_user->update($this->input->post('id_user'), $data);                
                $this->session->set_flashdata('message', '<div class="alert alert-info"> Ganti Password telah berhasil </div>');
                $this->profile($this->input->post('id_user'));
            }            
        } 
        else 
        {                        
            $this->ganti_password($this->input->post('id_user'));
        }
    }

}

/* End of file User.php */
