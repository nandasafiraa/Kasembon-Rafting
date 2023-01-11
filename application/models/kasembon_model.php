<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kasembon_model extends CI_Model {

	//search
	public function search($where, $tabel)
	{
		$query = $this->db->like($where)->get($tabel);
		return $query->result();
	}

	public function search_deskripsi($deskripsi)
	{
		return $this->db->like('deskripsi', $deskripsi)->get('tentang')->result();
	}

	public function get_tentang()
	{
		$arr= $this->db->get('tentang')->result();
		return $arr;
	}

	function insert_tentang($data)
	{
		$this->db->insert('tentang',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function update_tentang($data,$where){
		$this->db->where($where);
		$this->db->update('tentang',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}		
	
	function detil_tentang($where){		
		$arr = $this->db
        ->where('id', $where)        
        ->get('tentang')
		->row();
		return $arr;	
	}

	function delete_tentang($where){
		$this->db->delete('tentang', $where);
	}

    public function get_galeri()
	{
		$arr= $this->db->get('galeri')->result();
		return $arr;
	}
	
	function insert_galeri($data)
	{
		$this->db->insert('galeri',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function update_galeri($data,$where){
		$this->db->where($where);
		$this->db->update('galeri',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function detil_galeri($where){		
		$arr = $this->db
        ->where('id_gambar', $where)        
        ->get('galeri')
		->row();
		return $arr;	
	}

	function delete_galeri($where){
		$this->db->delete('galeri', $where);
	}

	// register
	public function get_register()
	{
		$arr= $this->db->get('user_login')->result();
		return $arr;
	}

	function insert_register($data)
	{
		$this->db->insert('user_login',$data);
	}

	function update_register($data,$where){
		$this->db->where($where);
		$this->db->update('user_login',$data);
	}	

	function detil_register($where){		
		$arr = $this->db
        ->where('id', $where)        
        ->get('user_login')
		->row();
		return $arr;	
	}

	function delete_register($where){
		$this->db->delete('user_login', $where);
	}

	// reservasi
	public function get_reservasi()
	{
		$arr= $this->db->get('reservasi')->result();
		return $arr;
	}

	function insert_reservasi($data)
	{
		$this->db->insert('reservasi',$data);
	}

	function delete_reservasi($where){
		$this->db->delete('reservasi', $where);
	}

	//tur
	public function get_tur()
	{
		$query= $this->db->get('paket_tour')->result();
		return $query;
	}
	function detil_tur($where){		
		$query = $this->db
        ->where('id', $where)        
        ->get('paket_tour')
		->row();
		return $query;	
	}
	function insert_tur($data){
		$this->db->insert('paket_tour',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function delete_tur($where){
		$this->db->delete('paket_tour', $where);
	}
	function update_tur($data,$where){
		$this->db->where($where);
		$this->db->update('paket_tour',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	

	//bukutamu
	public function get_buku()
	{
		$query = $this->db->get('buku_tamu');
		return $query->result();
	}
	function insert_buku($data){
		$this->db->insert('buku_tamu',$data);
	}
	function delete_buku($where){
		$this->db->delete('buku_tamu', $where);
	}

	//berita
	public function get_berita(){
		$query = $this->db->get('berita');
		return $query->result();
	}
	function detil_berita($where){		
		$query = $this->db
        ->where('id_berita', $where)        
        ->get('berita')
		->row();
		return $query;	
	}
	function insert_berita($data){
		$this->db->insert('berita',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function delete_berita($where){
		$this->db->delete('berita', $where);
	}
	function update_berita($data,$where){
		$this->db->where($where);
		$this->db->update('berita',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

}

/* End of file Masakan_model.php */
/* Location: ./application/models/Masakan_model.php */
