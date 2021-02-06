<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_manager extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    public function add_user($table, $data_user)
    {
        $this->db->insert($table, $data_user);

    }
    public function add($table, $data)
    {

        $this->db->insert($table, $data);

    }
    public function get($dtail, $user, $workgroup, $userB, $workgroupC, $where, $w_id, $d_id)
    {
        $this->db->select('*');
        $this->db->from($dtail);
        $this->db->join($user, $userB, 'left');
        $this->db->join($workgroup, $workgroupC, 'left');
        $this->db->where($where, $w_id);
        $this->db->order_by($d_id, "DESC");
        $query = $this->db->get();
        return $query->result();

    }
    public function getdetail($dtail, $user, $workgroup, $userB, $workgroupC, $where, $where_s, $post, $w_id)
    {
        $this->db->select('*');
        $this->db->from($dtail);
        $this->db->join($user, $userB, 'left');
        $this->db->join($workgroup, $workgroupC, 'left');
        $this->db->where($where, $w_id);
        $this->db->where($where_s, $post);
        $query = $this->db->get();
        return $query->result();

    }
    public function update($table, $data_detail, $id, $d_id)
    {
        $this->db->where($d_id, $id);
        $this->db->update($table, $data_detail);

    }
    public function del($id, $d_id, $table)
    {
        $this->db->where($d_id, $id);
        $this->db->delete($table);

    }
    public function delcount($id, $d_id, $table1)
    {
        $this->db->where($d_id, $id);
        $this->db->delete($table1);

    }

    public function getworkgroup($table)
    {

        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();

    }
//login
    public function cek_login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('u_name', $username);
        $this->db->where('u_pass', $password);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }

    }
    public function get_count($count, $id_file, $id_user)
    {
        $this->db->select('*');
        $this->db->from($count);
        // $this->db->join($detail, $detailB, 'left');
        // $this->db->join($user, $userc, 'left');
        $this->db->where('u_id', $id_user);
        $this->db->where('d_id', $id_file);
        $query = $this->db->get();
        return $query->result();

    }

    public function get_user($username)
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('u_name', $username);
        $query = $this->db->get();
        return $query->result();

    }
    public function update_count($table, $id_user, $id_file)
    {
        $this->db->set('c_cont', 'c_cont+1', false);
        $this->db->where('u_id', $id_user);
        $this->db->where('d_id', $id_file);
        $this->db->update($table);

    }
    public function add_count($table, $data_count)
    {

        $this->db->insert($table, $data_count);

    }
    public function show_user($count, $detail, $user, $detailB, $userc, $id_file)
    {
        $this->db->select('*');
        $this->db->from($count);
        $this->db->join($detail, $detailB, 'left');
        $this->db->join($user, $userc, 'left');
        $this->db->where('b.d_id', $id_file);
        $query = $this->db->get();
        return $query->result();

    }
    public function getcount($tablecount, $post)
    {
        $this->db->select_sum('c_cont');
        $this->db->from($tablecount);
        $this->db->where('d_id', $post);
        $query = $this->db->get();
        return $query->result();

    }
    public function Search($table, $name)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('u_name', $name);
        $this->db->or_where('u_FLname', $name);
        $query = $this->db->get();
        return $query->result();

    }
    public function update_pass($table, $data_user, $id)
    {
        $this->db->where('u_id', $id);
        $this->db->update($table, $data_user);

    }

}