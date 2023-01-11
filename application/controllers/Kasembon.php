<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasembon extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('kasembon_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('index');
	}
	//reservasiuser
	public function reservasiuser(){
		$data['query'] = $this->kasembon_model->get_tur();
		$this->load->view('reservasi_user', $data);
	}

	//beranda
	public function beranda()
	{
		if($this->session->userdata('login')==TRUE){
		$data['content_view'] = "admin/beranda";
		$this->load->view('admin/admin', $data);
	}
		else{
			redirect('Kasembon/login');
		}
	}
	//login
	public function login()
	{
		$this->load->view('admin/login');
	}

	//search
	public function search($tabel="", $nkolom="", $isi="")
	{
		$where = array($nkolom => $isi);
		$search =  $this->kasembon_model->search($where, $tabel);
		echo json_encode($search);
	}
	public function cari($deskripsi='')
	{
		$arr=$this->kasembon_model->search_deskripsi($deskripsi);
		echo json_encode($arr);
	}
	
	//tur
	public function paket_tour()
	{
		if($this->session->userdata('login')==TRUE){
			$data['content_view'] = "admin/tur";
			$this->load->model('kasembon_model');
			$data['query']=$this->kasembon_model->get_tur();
			$this->load->view('admin/admin', $data);}
			else{
				redirect('Kasembon/login');
			}
	}

	public function detiltur()
	{
		$id = $this->uri->segment(3);
		$data = $this->kasembon_model->detil_tur($id);
		echo json_encode($data);
	}

	public function addtur()
	{ 
		$this->form_validation->set_rules('nama_paket', 'nama_paket', 'trim|required', array('required' => 'Nama Paket harus diisi'));
		$this->form_validation->set_rules('fasilitas_1', 'fasilitas_1', 'trim|required', array('required' => 'Fasilitas 1 harus diisi'));
		$this->form_validation->set_rules('fasilitas_2', 'fasilitas_2', 'trim|required', array('required' => 'Fasilitas 2 harus diisi'));
		$this->form_validation->set_rules('fasilitas_3', 'fasilitas_3', 'trim|required', array('required' => 'Fasilitas 3 harus diisi'));
		$this->form_validation->set_rules('fasilitas_4', 'fasilitas_4', 'trim|required', array('required' => 'Fasilitas 4 harus diisi'));
		$this->form_validation->set_rules('fasilitas_5', 'fasilitas_5', 'trim|required', array('required' => 'Fasilitas 5 harus diisi'));
		$this->form_validation->set_rules('harga', 'harga', 'trim|required', array('required' => 'harga harus diisi'));
		if ($this->form_validation->run() == TRUE)
		{
			$config['upload_path'] = './assets/image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '100000';
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image')){
				$this->session->set_flashdata('pesan' , $this->upload->display_errors());
				return false;
			}
		else{
			$data = array(
				'nama_paket' => $this->input->post('nama_paket'),
				'image' => $this->upload->data('file_name'),
				'fasilitas_1' => $this->input->post('fasilitas_1'),
				'fasilitas_2' => $this->input->post('fasilitas_2'),
				'fasilitas_3' => $this->input->post('fasilitas_3'),
				'fasilitas_4' => $this->input->post('fasilitas_4'),
				'fasilitas_5' => $this->input->post('fasilitas_5'),
				'harga' => $this->input->post('harga')
				);
			$update = $this->kasembon_model->insert_tur($data);
			if ($update == TRUE)
			{
				$this->session->set_flashdata('pesan', 'sukses tambah');
			} else {
				$this->session->set_flashdata('pesan', 'gagal tambah');
			}
			redirect('Kasembon/paket_tour', 'refresh');
		}
			
	}else{
		$this->session->set_flashdata('pesan', validation_errors());
		redirect('Kasembon/paket_tour', 'refresh');
	}
	}

	public function updatetur()
	{
		$this->form_validation->set_rules('nama_paket', 'nama_paket', 'trim|required');
		$this->form_validation->set_rules('fasilitas_1', 'fasilitas_1', 'trim|required');
		$this->form_validation->set_rules('fasilitas_2', 'fasilitas_2', 'trim|required');
		$this->form_validation->set_rules('fasilitas_3', 'fasilitas_3', 'trim|required');
		$this->form_validation->set_rules('fasilitas_4', 'fasilitas_4', 'trim|required');
		$this->form_validation->set_rules('fasilitas_5', 'fasilitas_5', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Kasembon/paket_tour', 'refresh');
		}
		else {
			$nama_gambar = $_FILES['image']['name'];
			if ($nama_gambar!=="") {
			$config['upload_path'] = './assets/image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '200000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				return false;
			}
			else {
				$data = array(
					'nama_paket' => $this->input->post('nama_paket'),
					'image' => $this->upload->data('file_name'),
					'fasilitas_1' => $this->input->post('fasilitas_1'),
					'fasilitas_2' => $this->input->post('fasilitas_2'),
					'fasilitas_3' => $this->input->post('fasilitas_3'),
					'fasilitas_4' => $this->input->post('fasilitas_4'),
					'fasilitas_5' => $this->input->post('fasilitas_5'),
					'harga' => $this->input->post('harga')
					);
				$where = array(
					'id' => $this->input->post('id')
					);
				$update = $this->kasembon_model->update_tur($data, $where);
				if ($update == TRUE) {
					$this->session->set_flashdata('pesan', 'sukses update');
				}
				else {
					$this->session->set_flashdata('pesan', 'gagal update');
				}
				redirect('Kasembon/paket_tour', 'refresh');
			}
			
		}
			else{
				$data = array(
					'nama_paket' => $this->input->post('nama_paket'),
					'fasilitas_1' => $this->input->post('fasilitas_1'),
					'fasilitas_2' => $this->input->post('fasilitas_2'),
					'fasilitas_3' => $this->input->post('fasilitas_3'),
					'fasilitas_4' => $this->input->post('fasilitas_4'),
					'fasilitas_5' => $this->input->post('fasilitas_5'),
					'harga' => $this->input->post('harga')
					);
				$where = array(
					'id' => $this->input->post('id')
					);
				$update = $this->kasembon_model->update_tur($data, $where);
				if ($update == TRUE) {
					$this->session->set_flashdata('pesan', 'sukses update');
				}
				else {
					$this->session->set_flashdata('pesan', 'gagal update');
				}
				redirect('Kasembon/paket_tour', 'refresh');
			}
		}
	}
	function deletetur($id)
	{
		$where = array('id' => $id);
		$this->kasembon_model->delete_tur($where);
		redirect('Kasembon/paket_tour');
	}

	//bukutamu
	public function bukutamu()
	{
		if($this->session->userdata('login')==TRUE){
		$data['content_view'] = "admin/buku_tamu";
		$data['query'] = $this->kasembon_model->get_buku();
		$this->load->view('admin/admin', $data);}
		else{
			redirect('Kasembon/login');
		}
	}
	public function get_bukutamu()
	{		
		$data=$this->kasembon_model->get_buku();
		echo json_encode($data);
	
	}
	public function addbuku()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telpon' => $this->input->post('telpon'),
			'isi_aduan' => $this->input->post('isi_aduan'),
			'tipe' => $this->input->post('tipe')
			);
		$this->kasembon_model->insert_buku($data);
		redirect('Kasembon');
	}
	function deletebuku($id){
		$where = array('id' => $id);
		$this->kasembon_model->delete_buku($where);
		redirect('Kasembon/bukutamu');
	}
	//berita
	public function berita()
	{
		if($this->session->userdata('login')==TRUE){
		$data['content_view'] = "admin/berita";
		$data['query'] = $this->kasembon_model->get_berita();
		$this->load->view('admin/admin', $data);}
		else{
			redirect('Kasembon/login');
		}
	}
	public function get_berita()
	{		
		$data=$this->kasembon_model->get_berita();
		echo json_encode($data);
	
	}
	public function addberita()
	{
		$this->form_validation->set_rules('judul', 'judul', 'trim|required', array('required' => 'judul harus diisi'));
		$this->form_validation->set_rules('isi', 'isi', 'trim|required', array('required' => 'isi harus diisi'));
		if ($this->form_validation->run() == TRUE)
		{
			date_default_timezone_set('Asia/Jakarta');
			//upload file
			$config['upload_path'] = './assets/image';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2000000';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('image')){
			$this->session->set_flashdata('pesan' , $this->upload->display_errors());
			return false;
			redirect('Kasembon/berita', 'refresh');
			}
			else{
			$data =array(
			'judul' 	=> $this->input->post('judul'),
			'image' 	=> $this->upload->data('file_name'),
			'tgl'		=> date('y-m-d h:i:s'),
			'isi' 		=> $this->input->post('isi')
			);
			$update = $this->kasembon_model->insert_berita($data);
			if ($update == TRUE)
			{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			} else {
				$this->session->set_flashdata('pesan', 'sukses masuk');
			}
			redirect('Kasembon/berita', 'refresh');
			}	
		}else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Kasembon/berita');
		}
	}

	public function updateberita()
	{
		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
		$this->form_validation->set_rules('isi', 'isi', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Kasembon/berita', 'refresh');
		}
		else {
		date_default_timezone_set('Asia/Jakarta');
		$nama_gambar = $_FILES['image']['name'];
		if ($nama_gambar!=="") {
		$config['upload_path'] = './image';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '100000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image')){
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			return false;
			redirect('Kasembon/berita');
		}
		else{
		$data =array(
			'judul' => $this->input->post('judul'),
			'image' => $this->upload->data('file_name'),
			'tgl' => date('y-m-d h:i:s'),
			'isi' => $this->input->post('isi')
			);
			$where = array(
			'id_berita' => $this->input->post('id_berita')
			);
			$update = $this->kasembon_model->update_berita($data, $where);
			if ($update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect('Kasembon/berita');
		}
		} else 
		{
			$data =array(
				'judul' => $this->input->post('judul'),
				'tgl' => date('y-m-d h:i:s'),
				'isi' => $this->input->post('isi')
				);
				$where = array(
				'id_berita' => $this->input->post('id_berita')
				);
				$update = $this->kasembon_model->update_berita($data, $where);
			if ($update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect('Kasembon/berita', 'refresh');
		}		
		}	
	}

	function deleteberita($id){
		$where = array('id_berita' => $id);
		$this->kasembon_model->delete_berita($where);
		redirect('Kasembon/berita');
	}
	public function detilberita()
	{
		$id = $this->uri->segment(3);
		$data = $this->kasembon_model->detil_berita($id);
		echo json_encode($data);
	}
	//galeri
	public function galeri()
	{
		if($this->session->userdata('login')==TRUE){
		$data['content_view'] = "admin/galeri";
		$this->load->model('kasembon_model');
		$data['arr']=$this->kasembon_model->get_galeri();
		$this->load->view('admin/admin', $data);}
		else{
			redirect('Kasembon/login');
		}
	}

	public function get_galeri()
	{		
		$data=$this->kasembon_model->get_galeri();
		echo json_encode($data);
	
	}

	public function addgaleri()
	{
		$this->form_validation->set_rules('caption', 'caption', 'trim|required', array('required' => 'Caption harus diisi'));
		if ($this->form_validation->run() == TRUE)
		{
			$config['upload_path'] = './assets/image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '100000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image')){
			$this->session->set_flashdata('pesan' , $this->upload->display_errors());
			return false;
			}
			else{

			$data = array(
				'image' => $this->upload->data('file_name'),
				'caption' => $this->input->post('caption')
			);
		
			}
			$update = $this->kasembon_model->insert_galeri($data);
			if ($update == TRUE)
			{
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else {
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect('Kasembon/galeri', 'refresh');
		}else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Kasembon/galeri', 'refresh');
		}

	}

	public function updategaleri()
	{
		$this->form_validation->set_rules('caption', 'caption', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Kasembon/galeri', 'refresh');
		}
		else {
			$nama_gambar = $_FILES['image']['name'];
			if ($nama_gambar!=="") {
			$config['upload_path'] = './assets/image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '100000';
			$config['max_width']  = '102400';
			$config['max_height']  = '768000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				return false;
			}
			else{

			$data = array(
				'image' => $this->upload->data('file_name'),
				'caption' => $this->input->post('caption')
			);
			$where = array(
				'id_gambar' => $this->input->post('id_gambar')
			);
			$this->load->model('kasembon_model');
			$this->kasembon_model->update_galeri($data, $where);
			redirect('Kasembon/galeri');
			}
			} else 
			{
			$data=array(
				'caption' => $this->input->post('caption')
			);
			$where = array(
				'id_gambar' => $this->input->post('id_gambar')
			);
		}
			$update = $this->kasembon_model->update_galeri($data, $where);
			if ($update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect('Kasembon/galeri', 'refresh');
		}
		
	}

	public function detilgaleri()
	{
		$id_gambar = $this->uri->segment(3);
		$data = $this->kasembon_model->detil_galeri($id_gambar);
		echo json_encode($data);
	}

	function deletegaleri($id_gambar){
		$where = array('id_gambar' => $id_gambar);
		$this->load->model('kasembon_model');
		$this->kasembon_model->delete_galeri($where);
		redirect('Kasembon/galeri');
	}
 
	//tentangkami
	public function tentangkami()
	{
		if($this->session->userdata('login')==TRUE){
		$data['content_view'] = "admin/tentangkami";
		$this->load->model('kasembon_model');
		$this->load->view('admin/admin', $data);
		}else{
			redirect('Kasembon/login');
		}
	}
	public function get_tentang()
	{		
		$data  =$this->kasembon_model->get_tentang();
		echo json_encode($data);
	
	}
	public function addtentangkami()
	{
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required', array('required' => 'Deskripsi harus diisi'));
		if ($this->form_validation->run() == TRUE)
		{
			$config['upload_path'] = './assets/image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '100000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image')){
				$this->session->set_flashdata('pesan' , $this->upload->display_errors());
				return false;
			}
			else{

			$data = array(
				'image' => $this->upload->data('file_name'),
				'deskripsi' => $this->input->post('deskripsi')
			);
		
			}
			$update = $this->kasembon_model->insert_tentang($data);
			if ($update == TRUE)
			{
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else {
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect('Kasembon/tentangkami', 'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Kasembon/tentangkami', 'refresh');
		}
		
	}

	public function updatetentang()
	{
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Kasembon/tentangkami', 'refresh');
		}
		else {
			$nama_gambar = $_FILES['image']['name'];
			if ($nama_gambar!=="") {
			$config['upload_path'] = './assets/image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '200000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				return false;
			}
			else{

			$data = array(
				'image' => $this->upload->data('file_name'),
				'deskripsi' => $this->input->post('deskripsi')
			);
			$where = array(
				'id' => $this->input->post('id')
			);
			$update = $this->kasembon_model->update_tentang($data, $where);
			if ($update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect('Kasembon/tentangkami', 'refresh');
			}
			}
			else 
		{
		$data=array(
			'deskripsi' => $this->input->post('deskripsi')
		);
		$where = array(
			'id' => $this->input->post('id')
			);
		$update = $this->kasembon_model->update_tentang($data, $where);
		if ($update) {
			$this->session->set_flashdata('pesan', 'sukses update');
		}
		else {
			$this->session->set_flashdata('pesan', 'gagal update');
		}
		redirect('Kasembon/tentangkami');
		}
	}
}

	public function detiltentang()
	{
		$id = $this->uri->segment(3);
		$data = $this->kasembon_model->detil_tentang($id);
		echo json_encode($data);
	}

	function deletetentang($id){
		$where = array('id' => $id);
		$this->load->model('kasembon_model');
		$this->kasembon_model->delete_tentang($where);
		redirect('Kasembon/tentangkami');
	}

	// register, signin, signout
	public function signin()
	{
		$where = array(
            'username' => $this->input->post('username')
		);
		$userpass = $this->input->post('password');
		$query = $this->db->where($where)->get('user_login');
        if($this->db->affected_rows()>0){
			$data_login = $query->row();
			if (password_verify($userpass, $data_login->password)) {
            $data_session = array(
                'username' => $data_login->username,
				'login' => TRUE
            );
            $this->session->set_userdata($data_session);
			redirect('Kasembon/beranda');
		}
        }else{
			redirect('Kasembon/login');
        }
	}

	public function signout()
	{
		$this->session->sess_destroy();
        redirect('Kasembon/login');

	}
	public function admin()
	{
		if($this->session->userdata('login')==TRUE){
			$data['content_view'] = "admin/register";
		$this->load->model('kasembon_model');
		$data['arr']=$this->kasembon_model->get_register();
		$this->load->view('admin/admin', $data);}else{
				redirect('Kasembon/login');
			}
	}

	public function addregister() {

		$username = $this->input->post("username", true);
        $password = $this->input->post("password", true);

        $data = array (
			"hak" => 1,
            "username"=> $username,
            "password"=> password_hash($password, PASSWORD_BCRYPT),
		);
		$this->load->model('kasembon_model');
		$this->kasembon_model->insert_register($data);
		redirect('Kasembon/register');
    }

	public function updateregister()
	{
		$data = array(
			'hak' => 1,
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
		);
		$where = array(
			'id' => $this->input->post('id')
			);
		$this->load->model('kasembon_model');
		$this->kasembon_model->update_register($data, $where);
		redirect('Kasembon/register');
	}

	public function detilregister()
	{
		$id = $this->uri->segment(3);
		$data = $this->kasembon_model->detil_register($id);
		echo json_encode($data);
	}

	function deleteregister($id){
		$where = array('id' => $id);
		$this->load->model('kasembon_model');
		$this->kasembon_model->delete_register($where);
		redirect('Kasembon/register');
	}

	// reservasi
	public function reservasi()
	{
		if($this->session->userdata('login')==TRUE){
		$data['content_view'] = "admin/reservasi";
		$this->load->model('kasembon_model');
		$data['arr']=$this->kasembon_model->get_reservasi();
		$this->load->view('admin/admin', $data);}else{
			redirect('Kasembon/login');
		}
	}

	public function get_reservasi()
	{		
		$data=$this->kasembon_model->get_reservasi();
		echo json_encode($data);
	
	}

	public function addreservasi()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telpon' => $this->input->post('telpon'),
			'paket_id' => $this->input->post('paket_id'),
			'jumlah_orang' => $this->input->post('jumlah_orang'),
			'untuk_tanggal' => $this->input->post('untuk_tanggal'),
			'tanggal_pemesaan' => date('y-m-d h:i:s'),
			'catatan' => $this->input->post('catatan')
		);
		$this->load->model('kasembon_model');
		$this->kasembon_model->insert_reservasi($data);
		redirect('Kasembon/reservasi');
	}

	function deletereservasi($id){
		$where = array('id' => $id);
		$this->load->model('kasembon_model');
		$this->kasembon_model->delete_reservasi($where);
		redirect('Kasembon/reservasi');
	}

}

/* End of file Kasembon.php */
/* Location: ./application/controllers/Kasembon.php */