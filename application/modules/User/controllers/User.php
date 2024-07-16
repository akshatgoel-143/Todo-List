<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('todo');
        } else {
            $this->load->view('User/Login');
        }
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function register()
    {
        $this->load->view('signup');
    }

    public function signup()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');
        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password
        );
        $no = $this->user_model->email_exists($email);
        if ($no) {
            $data['error'] = 'E-mail ID already exists.';
            $this->load->view('signup', $data);
        } 
        elseif($password != $password2) {
            $data['error'] = 'Passwords do not match.';
            $this->load->view('signup', $data);
        }
        else {
            $this->user_model->register_user($data);
            redirect('login');
        }
    }

    public function authenticate()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->user_model->get_user($email, $password);

        if ($user) {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('user_id', $user->id);
            redirect('todo');
        } else {
            $data['error'] = 'Invalid email or password';
            $this->load->view('login', $data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        redirect('login');
    }
}
