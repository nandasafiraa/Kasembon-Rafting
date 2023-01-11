<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasembon extends CI_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_kasembon');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}
	public function index()
	{
		$data['tur'] = $this->m_kasembon->get_tabel('paket_tour');
		$data['galeri'] = $this->m_kasembon->get_tabel('galeri');
		$data['tentang'] = $this->m_kasembon->get_tabel('tentang');
		$data['berita'] = $this->m_kasembon->get_tabel('berita');
		$this->load->view('index', $data);
	}
	//search
	public function search($tabel="", $nkolom="", $isi="")
	{
		$where = array($nkolom => $isi);
		$search =  $this->m_kasembon->search($where, $tabel);
		echo json_encode($search);
	}
	//reservasiuser
	public function reservasiuser()
	{
		$data['query'] = $this->m_kasembon->get_tabel('paket_tour');
		$this->load->view('reservasi_user', $data);
	}

	//beritauser
	public function beritauser()
	{
		$data['query'] = $this->m_kasembon->get_tabel('berita');
		$this->load->view('berita_user', $data);
	}

	//beranda
	public function beranda()
	{
		if($this->session->userdata('login')==TRUE){
		$data['content_view'] = "admin/beranda";
		$this->load->view('admin/admin', $data);}
		else{
			redirect('Kasembon/login');
		}
	}

	//login
	public function login()
	{
		$this->load->view('admin/login');
	}

	//tur
	public function paket_tour()
	{
		if($this->session->userdata('login')==TRUE){
		$config = $this->pagination('paket_tour');
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
		$data['query']=$this->m_kasembon->get_tur($config["per_page"], $data['page']);
		$data['content_view'] = "admin/tur";
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('admin/admin', $data);
	}
	else
	{
		redirect('Kasembon/login');
	}
	}

	public function detiltur()
	{
		$id = $this->uri->segment(3);
		$data = $this->m_kasembon->detil_tur($id);
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
		$data = array(
			'nama_paket' => $this->input->post('nama_paket'),
			'fasilitas_1' => $this->input->post('fasilitas_1'),
			'fasilitas_2' => $this->input->post('fasilitas_2'),
			'fasilitas_3' => $this->input->post('fasilitas_3'),
			'fasilitas_4' => $this->input->post('fasilitas_4'),
			'fasilitas_5' => $this->input->post('fasilitas_5'),
			'harga' => $this->input->post('harga')
			);
			$update = $this->m_kasembon->insert_tur($data);
			if ($update == TRUE)
			{
				$this->session->set_flashdata('pesan', 'sukses tambah');
			} else {
				$this->session->set_flashdata('pesan', 'gagal tambah');
			}
			redirect('Kasembon/paket_tour', 'refresh');
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
			$update = $this->m_kasembon->update_tur($data, $where);
			if ($update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect('Kasembon/paket_tour', 'refresh');
		}
	}
	function deletetur($id)
	{
		$where = array('id' => $id);
		$this->m_kasembon->delete_tur($where);
		redirect('Kasembon/paket_tour');
	}

	//bukutamu
	public function bukutamu()
	{
		if($this->session->userdata('login')==TRUE){
			$config = $this->pagination('buku_tamu');
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
			$data['query']=$this->m_kasembon->get_buku($config["per_page"], $data['page']);
			$data['content_view'] = "admin/buku_tamu";
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/admin', $data);
		}
		else{
			redirect('Kasembon/login');
		}
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
		$this->m_kasembon->insert_buku($data);
		redirect('Kasembon');
	}
	function deletebuku($id){
		$where = array('id' => $id);
		$this->m_kasembon->delete_buku($where);
		redirect('Kasembon/bukutamu');
	}

	//tentangkami
	public function tentangkami()
	{
		if($this->session->userdata('login')==TRUE){
			$config = $this->pagination('tentang');
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
			$data['arr']=$this->m_kasembon->get_tentang($config["per_page"], $data['page']);
			$data['content_view'] = "admin/tentangkami";
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/admin', $data);
		}else{
			redirect('Kasembon/login');
		}
	}

	public function addtentangkami()
	{
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required', array('required' => 'Deskripsi harus diisi'));
		if ($this->form_validation->run() == TRUE)
		{
		$config['upload_path'] = './assets/images';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '100000';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar')){
			$this->session->set_flashdata('pesan' , $this->upload->display_errors());
			return false;
		}
		else{

		$data = array(
			'image' => $this->upload->data('file_name'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		$update = $this->m_kasembon->insert_tentang($data);
		if ($update == TRUE)
			{
				$this->session->set_flashdata('pesan', 'sukses tambah');
			} else {
				$this->session->set_flashdata('pesan', 'gagal tambah');
			}
		redirect('Kasembon/tentangkami');
		}		
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
			$nama_gambar = $_FILES['gambar']['name'];
			if ($nama_gambar!=="") {
			$config['upload_path'] = './assets/images';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '200000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
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
			$update = $this->m_kasembon->update_tentang($data, $where);
			if ($update == TRUE) {
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect('Kasembon/tentangkami', 'refresh');
			}
			}
			else {
		$data=array(
			'deskripsi' => $this->input->post('deskripsi')
		);
		$where = array(
			'id' => $this->input->post('id')
			);
		$update = $this->m_kasembon->update_tentang($data, $where);
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
		$data = $this->m_kasembon->detil_tentang($id);
		echo json_encode($data);
	}
	
	public function deletetentang($id){
		$where = array('id' => $id);
		$this->m_kasembon->delete_tentang($where);
		redirect('Kasembon/tentangkami');
	}

	//berita
	public function berita()
	{
		if($this->session->userdata('login')==TRUE){
			$config = $this->pagination('berita');
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
			$data['query']=$this->m_kasembon->get_berita($config["per_page"], $data['page']);
			$data['content_view'] = "admin/berita";
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/admin', $data);
		}else{
			redirect('Kasembon/login');
		}
	}
	
	public function addberita(){
		$this->form_validation->set_rules('judul', 'judul', 'trim|required', array('required' => 'judul harus diisi'));
		$this->form_validation->set_rules('isi', 'isi', 'trim|required', array('required' => 'isi harus diisi'));
		if ($this->form_validation->run() == TRUE)
		{
		date_default_timezone_set('Asia/Jakarta');
		//upload file
		$config['upload_path'] = './assets/admin/berita_img';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '2000000';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('image')){
			$this->session->set_flashdata('notif' , $this->upload->display_errors());
			return false;
			redirect('Kasembon/berita');
		}
		else{
		$data =array(
			'judul' 	=> $this->input->post('judul'),
			'image' 	=> $this->upload->data('file_name'),
			'tgl'		=> date('y-m-d h:i:s'),
			'isi' 		=> $this->input->post('isi')
			);
			$update = $this->m_kasembon->insert_berita($data);
			if ($update == TRUE)
			{
				$this->session->set_flashdata('pesan', 'sukses tambah');
			} else {
				$this->session->set_flashdata('pesan', 'gagal tambah');
			}
			redirect('Kasembon/berita');
	}
}else{
	$this->session->set_flashdata('pesan', validation_errors());
	redirect('Kasembon/berita');
}
}
	public function updateberita(){
		$this->form_validation->set_rules('judul', 'judul', 'trim|required', array('required' => 'judul harus diisi'));
		$this->form_validation->set_rules('isi', 'isi', 'trim|required', array('required' => 'isi harus diisi'));
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Kasembon/berita', 'refresh');
		}
		else {
			date_default_timezone_set('Asia/Jakarta');
			$nama_gambar = $_FILES['image']['name'];
			if ($nama_gambar!=="") {
			$config['upload_path'] = './assets/admin/berita_img';
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
				$update = $this->m_kasembon->update_berita($data, $where);
				if ($update == TRUE) {
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
					$update = $this->m_kasembon->update_berita($data, $where);
				if ($update == TRUE) {
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
		$this->m_kasembon->delete_berita($where);
		redirect('Kasembon/berita');
	}
	public function detilberita()
	{
		$id = $this->uri->segment(3);
		$data = $this->m_kasembon->detil_berita($id);
		echo json_encode($data);
	}

	//register, login, logout

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
		}else{
			$this->session->set_flashdata('notif','Password salah');
			redirect('Kasembon/login');
		}
        }else{
			$this->session->set_flashdata('notif','Username tidak ditemukan');
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
		$data['arr']=$this->m_kasembon->get_register();
		$this->load->view('admin/admin', $data);
		}
		else{
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
		$this->m_kasembon->insert_register($data);
		redirect('Kasembon/admin');
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
		$this->m_kasembon->update_register($data, $where);
		redirect('Kasembon/admin');
	}


	public function detilregister()
	{
		$id = $this->uri->segment(3);
		$data = $this->m_kasembon->detil_register($id);
		echo json_encode($data);
	}

	function deleteregister($id){
		$where = array('id' => $id);
		$this->load->model('m_kasembon');
		$this->m_kasembon->delete_register($where);
		redirect('Kasembon/admin');
	}

	//galeri
	public function galeri()
	{
		if($this->session->userdata('login')==TRUE){
			$config = $this->pagination('galeri');
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
			$data['query']=$this->m_kasembon->get_galeri($config["per_page"], $data['page']);
			$data['content_view'] = "admin/galeri";
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/admin', $data);
		}
		else{
			redirect('Kasembon/login');
		}		
	}
	
	public function addgaleri()
	{
		$this->form_validation->set_rules('caption', 'caption', 'trim|required', array('required' => 'Caption harus diisi'));
		if ($this->form_validation->run() == TRUE)
		{
			$config['upload_path'] = './assets/image_galeri';
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
			$update = $this->m_kasembon->insert_galeri($data);
			if ($update == TRUE)
			{
				$this->session->set_flashdata('pesan', 'sukses tambah');
			} else {
				$this->session->set_flashdata('pesan', 'gagal tambah');
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
			$config['upload_path'] = './assets/image_galeri';
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
			$this->load->model('m_kasembon');
			$this->m_kasembon->update_galeri($data, $where);
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
			$update = $this->m_kasembon->update_galeri($data, $where);
			if ($update == TRUE) {
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
		$data = $this->m_kasembon->detil_galeri($id_gambar);
		echo json_encode($data);
	}

	function deletegaleri($id_gambar){
		$where = array('id_gambar' => $id_gambar);
		$this->m_kasembon->delete_galeri($where);
		redirect('Kasembon/galeri');
	}

	// reservasi
	public function reservasi()
	{
		if($this->session->userdata('login')==TRUE){
			$config = $this->pagination('reservasi');
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
			$data['query']=$this->m_kasembon->get_reservasi($config["per_page"], $data['page']);
			$data['content_view'] = "admin/reservasi";
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/admin', $data);
		}
		else{
			redirect('Kasembon/login');
		}	
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
			'tanggal_pemesanan' => date('y-m-d h:i:s'),
			'catatan' => $this->input->post('catatan')
		);
		$this->m_kasembon->insert_reservasi($data);
		redirect('Kasembon/reservasiuser');
	}

	function deletereservasi($id){
		$where = array('id' => $id);
		$this->m_kasembon->delete_reservasi($where);
		redirect('Kasembon/reservasi');
	}

	//pagination
	public function pagination($tabel){
		//konfigurasi pagination
        $config['base_url'] = site_url('kasembon/'.$tabel); //site url
        $config['total_rows'] = $this->db->count_all($tabel); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		
		return $config;
	}

}

/* End of file Kasembon.php */
/* Location: ./application/controllers/Kasembon.php */