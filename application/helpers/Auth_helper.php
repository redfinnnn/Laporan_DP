<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function cek_login()
{
    $CI = &get_instance();
    $username = $CI->session->username;
    if($username==NULL){
        $CI->session->set_flashdata('message','<div class="alert alert-danger">Session Error! Login terlebih dahulu!</div>');
        
        redirect('auth/login','refresh');
        
    }
}

function is_admin()
{
    $CI = &get_instance();

    $tipeuser = $CI->session->level_user;

    if($tipeuser == '0'){
        return True;
    }
}