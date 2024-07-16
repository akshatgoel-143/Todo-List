<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        // $this->load->database(); // Load the database
    }

    public function register_user($data)
    {
        $this->db->insert('users', $data);
    }

    public function get_user($email, $password)
    {
        // $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        // $query = $this->db->query($sql);
        // $n = $query->num_rows();
        // echo $query->num_rows(); die;

        //---------------OR--------------
        
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('users');      
        // echo $this->db->last_query();
        // echo $query->num_rows(); die;

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->num_rows() > 0 ? true : false;
    }

    public function get_username($user_id)
    {
        // $this->db->where('id', $user_id);
        $sql = "SELECT name FROM `users` where id = $user_id";
        $query = $this->db->query($sql);
        return $query->row()->name;
    }
}
