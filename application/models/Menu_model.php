<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getperpus()
    {
        $query = "SELECT `data_buku`.*, `kategori_buku`. `nama_kelas`
            FROM `data_buku` JOIN `kategori_buku`
            ON `data_buku`.`id_kelas` = `kategori_buku`.`id`
            ";

        return $this->db->query($query)->result_array();
    }
    

//hapus

    public function rolehapus($id)
    {
        
        $this->db->where('id',$id);
        $this->db->delete('user_role');
    }

    public function managementhapus($id)
    {
        
        $this->db->where('id',$id);
        $this->db->delete('user_menu');
    }

    public function submenuhapus($id)
    {
        
        $this->db->where('id',$id);
        $this->db->delete('user_sub_menu');
    }

    public function datahapus($id)
    {
        
        $this->db->where('id',$id);
        $this->db->delete('data_buku');
    }

    public function kategorihapus($id)
    {
        
        $this->db->where('id',$id);
        $this->db->delete('kategori_buku');
    }

//end hapus

//edit

    public function role_edit($data)
    {
        
        $this->db->where('id', $data['id']);
        $this->db->update('user_role', $data);
    }
    public function menu_edit($data)
    {
        
        $this->db->where('id', $data['id']);
        $this->db->update('user_menu', $data);
    }
    public function submenu_edit($data)
    {
        
        $this->db->where('id', $data['id']);
        $this->db->update('user_sub_menu', $data);
    }
    public function kategori_edit($data)
    {
        
        $this->db->where('id', $data['id']);
        $this->db->update('kategori_buku', $data);
    }
    public function databuku_edit($data)
    {
        
        $this->db->where('id', $data['id']);
        $this->db->update('data_buku', $data);
    }
    
}