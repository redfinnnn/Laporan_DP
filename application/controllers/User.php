<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

}

/* End of file User.php */
