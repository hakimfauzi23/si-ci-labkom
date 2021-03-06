<?php

class M_PinjamAlat extends CI_Model {
    
    //Fungsi untuk mendapatkan data dari database grt(nama table)
    public function get_data($limit,$start)
    {
        // return $this->db->get('peminjaman_alat')->result_array();
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_alat.nim','LEFT');
        $this->db->join('alat','alat.id_alat = peminjaman_alat.id_alat','LEFT');
        $query = $this->db->get('peminjaman_alat',$limit, $start);
        return $query;

    }

    public function get_alat()
    {
            $query = $this->db->get('alat');
            return $query;
    }

    public function get_id()
    {
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }


    public function get_details($where,$table){
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_alat.nim','LEFT');
        $this->db->join('alat','alat.id_alat = peminjaman_alat.id_alat','LEFT');
        $query = $this->db->get_where($table,$where);
        return $query;
    }
    
    //Fungsi untuk input data 
    public function insert_entry($data)
    {
        $this->db->insert('peminjaman_alat',$data);
    }

    public function get_harga($where,$table)
    {
        $this->db->select('harga');
        $query = $this->db->get_where($table,$where);
        if ($query->num_rows() > 0) {
            return $query->row()->harga;
        }
        return false;
    }



    //Fungsi untuk hapus data
    public function delete_entry($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Fungsi untuk edit data 
    public function edit_data($where,$table)
    {
        return $this->db->get_where($table,$where);
    }


    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function export_excel()
     {
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_alat.nim','LEFT');
        $this->db->join('alat','alat.id_alat = peminjaman_alat.id_alat','LEFT');
        $query = $this->db->get('peminjaman_alat')->result();
        return $query;
     }


} 