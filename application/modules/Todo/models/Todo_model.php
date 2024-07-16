<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Todo_model extends CI_Model
{
    public function getTodos($user_id)
    {
        // $this->db->where('user_id', $user_id);
        // $query = $this->db->get('todos');    
        $sql = "SELECT * FROM todos WHERE user_id = $user_id ;";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function add_todo($data)
    {
        $this->db->insert('todos', $data);
    }

    public function getTodo_by_user($id, $user_id)
    {
        $this->db->where('id', $id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('todos');
        return $query->row();
    }

    public function update_todo($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('todos', $data);
    }

    public function delete_todo($id, $user_id)
    {
        $this->db->where('id', $id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('todos');
    }

    public function sort_todo($user_id, $sort_type, $order_by)
    {
        $sql = "SELECT * FROM todos WHERE user_id = $user_id ORDER BY $order_by";
        $query = $this->db->query($sql);

        return $query->result();
    }
}
