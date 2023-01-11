<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kasembon extends CI_Model {
	public function __construct()	{
		$this->load->database(); 
	  }
	//pageuser
	public function get_tabel($tabel)
	{
		$query = $this->db->get($tabel);
		return $query->result();
	}
	//search
	public function search($where, $tabel)
	{
		$query = $this->db->like($where)->get($tabel);
		return $query->result();
	}
	//galeri
	public function get_galeri($limit, $start)
	{
		$query = $this->db->get('galeri', $limit, $start);
		return $query->result();
	}
	function insert_galeri($data){
		$this->db->insert('galeri',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function detil_galeri($where){		
		$query = $this->db
        ->where('id_gambar', $where)        
        ->get('galeri')
		->row();
		return $query;	
	}
	function delete_galeri($where){
		$this->db->delete('galeri', $where);
	}
	function update_galeri($data,$where){
		$this->db->where($where);
		$this->db->update('galeri', $data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	

	//reservasi
	public function get_reservasi($limit, $start)
	{
		$query = $this->db->join('paket_tour','paket_tour.id=reservasi.paket_id')->get('reservasi',$limit, $start);
		return $query->result();
	}
	function insert_reservasi($data){
		$this->db->insert('reservasi',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function delete_reservasi($where){
		$this->db->delete('reservasi', $where);
	}

	//tur
	public function get_tur($limit, $start)
	{
		$query = $this->db->get('paket_tour', $limit, $start);
		return $query->result();
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
	public function get_buku($limit, $start)
	{
		$query = $this->db->get('buku_tamu',$limit, $start);
		return $query->result();
	}
	function insert_buku($data){
		$this->db->insert('buku_tamu',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function delete_buku($where){
		$this->db->delete('buku_tamu', $where);
	}

	//tentang 
	public function get_tentang($limit, $start)
	{
		$arr= $this->db->get('tentang', $limit, $start)->result();
		return $arr;
	}
	
	function insert_tentang($data)
	{
		$this->db->insert('tentang', $data);
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

	//berita
	public function get_berita($limit, $start){
		$query = $this->db->get('berita',$limit, $start);
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
	
	//register
	public function get_register()
	{
		$arr= $this->db->get('user_login')->result();
		return $arr;
	}

	function insert_register($data)
	{
		$this->db->insert('user_login',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function update_register($data,$where){
		$this->db->where($where);
		$this->db->update('user_login',$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
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

	//signin
	function signin($where){
	}
}
