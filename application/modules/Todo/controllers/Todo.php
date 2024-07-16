<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Todo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Todo_model', 'todo_model');
        $this->load->model('user/User_model', 'user_model');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');

        // $name = $this->session->userdata('name');
        $data['todos'] = $this->todo_model->getTodos($user_id);
        $data['name'] = $this->user_model->get_username($user_id);
        $this->load->view('todo_view', $data);
    }

    public function sort_todo()
    {
        $user_id = $this->session->userdata('user_id');
        $sort_type = $this->input->post('sort_type');

        if($sort_type == "name") {
            $order_by=  "title";
        }
        else if($sort_type == "status") {
         $order_by=  "status";
           
        }
        else {
            $order_by=  "id";
        }
        
        $data['todos'] = $this->todo_model->sort_todo($user_id, $sort_type,$order_by);
        $data['name'] = $this->user_model->get_username($user_id);
        $this->load->view('todo_view', $data);
    }

    public function add()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('user');
        }
        $this->load->view('add_view');
    }

    public function add_todo()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('user');
        }
        $user_id = $this->session->userdata('user_id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $status = $this->input->post('status');

        $data = array(
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'status' => $status
        );

        $this->todo_model->add_todo($data);

        redirect('todo');
    }

    public function find()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('user');
        }
        $user_id = $this->session->userdata('user_id');
        $name = $this->session->userdata('name');
        $data['todos'] = $this->todo_model->getTodos($user_id);
        $this->load->view('find_todo',$data);
    }

    public function search()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('user');
        }
        $user_id = $this->session->userdata('user_id');
        $id = $this->input->post('todo_title');
        $data['todo'] = $this->todo_model->getTodo_by_user($id, $user_id);
        $this->load->view('update_view', $data);
    }

    public function update($id)
    {
        if(!$this->session->userdata('logged_in')){
            redirect('user');
        }
        $user_id = $this->session->userdata('user_id');
        $data['todo'] = $this->todo_model->getTodo_by_user($id, $user_id);
        $this->load->view('update_view', $data);
    }

    public function update_todo($id)
    {
        if(!$this->session->userdata('logged_in')){
            redirect('user');
        }
        // $id = $this->session->userdata('id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $status = $this->input->post('status');
        $data = array(
            'title' => $title,
            'description' => $description,
            'status' => $status
        );
        $this->todo_model->update_todo($id, $data);

        redirect('todo');
    }

    public function delete()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('user');
        }
        $user_id = $this->session->userdata('user_id');
        $name = $this->session->userdata('name');
        $data['todos'] = $this->todo_model->getTodos($user_id);
        $this->load->view('delete_view',$data);
    }

    public function deleting()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('user');
        }
        $id = $this->input->post('todo_title');
        $user_id = $this->session->userdata('user_id');
        $this->todo_model->delete_todo($id,$user_id);
        redirect('todo');

    }

    public function delete_todo($id)
    {
        if(!$this->session->userdata('logged_in')){
            redirect('user');
        }
        $user_id = $this->session->userdata('user_id');
        $this->todo_model->delete_todo($id,$user_id);

        redirect('todo');
    }
}
