<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('password');
        $this->load->model('account_model');
    }

	public function index()
	{
        if( $this->session->userdata('logged_in') )
        {
            redirect('admin');             
        }
        else
        {
            $this->session->sess_destroy();
            $this->load->view('login');
        }
	}

	public function login()
	{
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $detail = $this->account_model->user_login($user, $pass);

        if( $detail != false )
        {
            $newdata = array(
                'display_name'  => $detail->display_name,
                'logged_in' => TRUE );
            $this->session->set_userdata($newdata);
            redirect('admin');
        }
        else
        {
            $this->session->set_flashdata('error','Wrong login details !');
            return redirect('account');                    
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('account');
    }
     
    public function reg()
    {
        $this->load->view('register');
    }   

    public function register()
    {
        $username = $this->input->post('username');
        $display_name = $this->input->post('display_name');       
        $password = $this->input->post('password');
        $passwordc = $this->input->post('pass2');

        if( $password == $passwordc )
        {
            $registration_form = array(
                    'username' => $username,
                    'display_name' =>$display_name,
                    'password'=>$password
                );

            $res = $this->account_model->std_register($registration_form);
            
            if( $res == 1 )
            {
                $this->session->set_flashdata('success','Account created!');
                return redirect('account');
            }
            else
            {
                $this->session->set_flashdata('error',$res);
                return redirect('account/reg');
            }
        }
        else
        {
            $this->session->set_flashdata('error','Passwords do not match!');
            return redirect('account/reg');
        }
        
    }

}