<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_model extends CI_Model {

	public function get_tentang()
	{
		$arr= $this->db->get('tentang')->result();
		return $arr;
	}
	public function masuk_db()
	{
		$config['upload_path'] = './assets/gambar';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '100000';
		$config['max_width']  = '102400';
		$config['max_height']  = '768000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar')){
			$this->session->set_flashdata('pesan' , $this->upload->display_errors());
			return false;
		}
		else{

		$arr['nama_masakan'] = $this->input->post('nama_masakan');
		$arr['gambar'] = $this->upload->data('file_name');
		$arr['harga'] = $this->input->post('harga');
		$arr['status_masakan'] = $this->input->post('status_masakan');
		$ql_masuk=$this->db->insert('Masakan', $arr);
		return $ql_masuk;

	}
	}
	public function detail_masakan($id_masakan='')
	{
		return $this->db->where('id_masakan', $id_masakan)->get('Masakan')->row();
	}
	public function update_masakan()
	{
		$nama_gambar = $_FILES['gambar']['name'];
		if ($nama_gambar!=="") {
		$config['upload_path'] = './assets/gambar';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '100000';
		$config['max_width']  = '102400';
		$config['max_height']  = '768000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar')){
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			return false;
		}
		else{

		$dt_up_masakan=array(
			'nama_masakan' => $this->input->post('nama_masakan'),
			'gambar' => $this->upload->data('file_name'),
			'harga' => $this->input->post('harga'),
			'status_masakan' => $this->input->post('status_masakan')
		);
		return $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('Masakan', $dt_up_masakan);
		}
		} else {
		$dt_up_masakan=array(
			'nama_masakan' => $this->input->post('nama_masakan'),
			'harga' => $this->input->post('harga'),
			'status_masakan' => $this->input->post('status_masakan')
		);
		return $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('Masakan', $dt_up_masakan);
		}
	}
	public function hapus_masakan($id_masakan)
	{
		$this->db->where('id_masakan', $id_masakan);
		return $this->db->delete('Masakan');
	}

}

/* End of file Masakan_model.php */
/* Location: ./application/models/Masakan_model.php */
