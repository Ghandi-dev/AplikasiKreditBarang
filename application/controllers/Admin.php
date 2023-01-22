<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){ 
		parent::__construct(); 
		if($this->session->userdata('status') != "login_admin"){
			redirect('Login/admin');
		}
	}

	public function index(){
		//method yang nanti akan digunakan di model 
		//untuk menampilkan data yang ada pada database
		$tabel = 'tb_pelanggan';
		$data['pelanggan'] = $this->M_pelanggan->tampil_data($tabel)->result();
		$this->load->view('admin/pelanggan',$data);
	}
	//fungsi untuk menambah data 
	public function tambah(){
		$segment = $this->input->post('uri');
		if($segment == 'index'){
			$nama		= $this->input->post('nama');
			$alamat		= $this->input->post('alamat');
			$nomor_hp	= $this->input->post('nomor_hp');

			//upload foto ke folder
			$config['upload_path'] = './assets/foto/';
			$config['allowed_types'] = 'jpg|png|gif';
			$config['max_size'] = 5000; // max 5 MB

			$this->load->library('upload',$config);

			if($this->upload->do_upload('foto')){
				//jika upload berhasil maka isi variabel $foto = file_name
				$foto=$this->upload->data('file_name');
			}else{
				//jika gagal upload maka isi variabel $foto = 'no_image.jpg'
				//echo "Upload Gagal";
				$foto='no_image.jpg';
			}
			
			//data yang dikirim harus bertipe array
			$data = array(
			'nama_pelanggan'=>$nama,
			'alamat'=>$alamat,
			'nomor_hp'=>$nomor_hp,
			'foto_ktp'=>$foto
			);

			//method yang nanti akan digunakan di model 
			//untuk memasukan data ke database
			$this->M_pelanggan->input_data('tb_pelanggan', $data);
			redirect('Admin/index');
		}elseif($segment == 'ambilData'){
			$kode_pelanggan = $this->input->post('kode_pelanggan');
			$nama_barang = $this->input->post('nama_barang');
			$harga_beli = $this->input->post('harga_beli');
			$harga_jual = $this->input->post('harga_jual');
			$nama_toko = $this->input->post('nama_toko');
			$data = array (
				'kode_pelanggan'=>$kode_pelanggan,
				'nama_barang'	=>$nama_barang,
				'harga_beli'	=>$harga_beli,
				'harga_jual'	=>$harga_jual,
				'nama_toko'		=>$nama_toko,
			);
			$this->M_penjualan->input_data('tb_penjualan', $data);
			redirect('Admin/penjualan');
		}elseif($segment == 'detail'){
			$kode_penjualan = $this->input->post('kode_penjualan');
			$var = $this->input->post('var');
			$tgl_bayar = $this->input->post('tgl_bayar');
			$bayar = $this->input->post('bayar');
			$sisa = $this->input->post('sisa');
			$sisa_bayar = $sisa-$bayar;
			
			$data = array(
				'kode_penjualan' => $kode_penjualan,
				'tgl_bayar' => $tgl_bayar,
				'bayar' => $bayar,
				'sisa_bayar' => $sisa_bayar,
			);
			$this->M_penjualan->input_data('tb_pembayaran',$data);
			redirect('Admin/detail/'.$kode_penjualan.'/'.$var);
		}
	}
	public function test()
	{
		$this->load->view('admin/test');
	}

	//fungsi untuk menghapus data
	public function hapus($id,$segment){
		if ($segment=='index') {
			//method yang nanti akan digunakan di model
			//untuk menghapus data dari database
			$data = $this->M_pelanggan->foto($id);
			if ($data->foto_ktp!='no_image.jpg') { //jika foto bukan 'no_image.jpg' maka hapus
				//lokasi gambar
				$path='./assets/foto/';
				// //hapus data di folder
				@unlink($path.$data->foto_ktp);		
			}
			$this->M_pelanggan->hapus_data($id,$segment, 'tb_pelanggan');
			redirect('Admin/index');
			
		}elseif ($segment == 'penjualan') {
			$this->M_pelanggan->hapus_data($id,$segment,'tb_penjualan');
			redirect('Admin/penjualan');
		}
	}
	public function hapus_detail($id,$kode,$var,$segment)
	{
		$this->M_pelanggan->hapus_data($id,$segment,'tb_pembayaran');
		redirect('Admin/detail/'.$kode.'/'.$var);
	}

	//fungsi untuk mengambil data 
	public function ambilData($id){
		//method yang nanti akan digunakan di model
		//untuk merubah data dari database
		$data['pelanggan'] = $this->M_pelanggan->edit_data($id,'tb_pelanggan','index');
		$this->load->view('admin/tambah', $data);
	}
	public function edit($id,$segment){
		if($segment=='index'){
			//method yang nanti akan digunakan di model
			//untuk merubah data dari database
			$data['pelanggan'] = $this->M_pelanggan->edit_data($id,'tb_pelanggan',$segment);
			$this->load->view('admin/edit_pelanggan', $data);
		}elseif ($segment == 'penjualan') {
			//method yang nanti akan digunakan di model
			//untuk merubah data dari database
			$data['penjualan'] = $this->M_pelanggan->edit_data($id,'tb_penjualan',$segment);
			$this->load->view('admin/edit_penjualan', $data);
		}elseif ($segment == 'detail') {
			$data['pembayaran'] = $this->M_pelanggan->edit_data($id,'tb_pembayaran',$segment);
			// echo print_r($data);
			$this->load->view('admin/edit_pembayaran',$data);
		}
	}
	
	//fungsi untuk memperbaharui/mengupdate data dari database
	public function update(){
		$segment = $this->input->post('uri');
		if($segment == 'index'){
			$kode_pelanggan = $this->input->post('kode_pelanggan');
			$nama_pelanggan = $this->input->post('nama_pelanggan');
			$alamat 		= $this->input->post('alamat');
			$nomor_hp 		= $this->input->post('nomor_hp');
			$old_foto 		= $this->input->post('old_foto');
			$foto 			= $_FILES['foto']['name'];
			if ($foto == ''){ //jika $foto kosong
				$foto=$old_foto;
			}else{
				//upload foto ke folder
				$config['upload_path'] = './assets/foto/';
				$config['allowed_types'] = 'jpg|png|gif';
				$config['max_size'] = 5000; // max 5 MB
				$this->load->library('upload',$config);
				if($this->upload->do_upload('foto')){ //jika upload berhasil maka isi variabel $foto = file_name
					$foto=$this->upload->data('file_name'); 
				}else{ //Jika gagal upload maka isi variabel $foto = 'no_image.jpg'
						echo "Upload Gagal";
						$foto='no_image.jpg';
					}
				//hapus foto
				if ($old_foto!='no_image.jpg') { //jika foto bukan 'no_image.jpg' maka hapus
					//lokasi gambar
					$path='./assets/foto/';
					//hapus data di folder
					@unlink($path.$old_foto);		
				}
			}

			$data = array(
			'nama_pelanggan'=>$nama_pelanggan,
			'alamat'=>$alamat,
			'nomor_hp'=>$nomor_hp,
			'foto_ktp'=>$foto
			);
			$where=array(
			'kode_pelanggan'=>$kode_pelanggan
			);
			//method yang nanti akan digunakan di model
			//untuk merubah mengapdate data dari database
			$this->M_pelanggan->update_data($where,$data,'tb_pelanggan');
			redirect('Admin/index');
		}elseif($segment == 'penjualan'){
			$kode_penjualan = $this->input->post('kode_penjualan');
			$nama_barang = $this->input->post('nama_barang');
			$harga_beli = $this->input->post('harga_beli');
			$harga_jual = $this->input->post('harga_jual');
			$nama_toko = $this->input->post('nama_toko');
			
			$data = array(
				'nama_barang' => $nama_barang,
				'harga_beli' => $harga_beli,
				'harga_jual' => $harga_jual,
				'nama_toko'	=> $nama_toko
			);
			$where = array(
				'kode_penjualan' => $kode_penjualan
			);
			$this->M_pelanggan->update_data($where,$data,'tb_penjualan');
			redirect('Admin/penjualan');
		}elseif ($segment == 'detail') {
			$kode_pembayaran = $this->input->post('kode_pembayaran');
			$kode_penjualan = $this->input->post('kode_penjualan');
			$var = $this->input->post('var');
			$tgl_bayar = $this->input->post('tgl_bayar');
			$bayar = $this->input->post('bayar');
			$bayar2 = $this->input->post('bayar2');
			$sisa = $this->input->post('sisa');
			$sisa_bayar = $sisa + ($bayar - $bayar2);
			// echo $sisa_bayar;
			$data = array(
				'tgl_bayar' => $tgl_bayar,
				'bayar' => $bayar2,
				'sisa_bayar' => $sisa_bayar,
			);
			$where = array(
				'kode_pembayaran' => $kode_pembayaran,
			);
			$this->M_pelanggan->update_data($where,$data,'tb_pembayaran');
			redirect('Admin/detail/'.$kode_penjualan.'/'.$var);
		}
	}
	
	public function penjualan(){
		$data['pelanggan'] = $this->M_pelanggan->tampil_data('tb_pelanggan')->result();
		$data['penjualan'] = $this->M_pelanggan->tampil_data('tb_penjualan')->result();
		$this->load->view('admin/penjualan',$data);
	}

	public function pembayaran(){
		$data['pembayaran'] = $this->M_pelanggan->tampil_data('tb_penjualan')->result();
		$this->load->view('admin/pembayaran',$data);
	}
	public function detail($id,$harga)
	{
		$data['bayar'] =array('id'=>$id, 'harga'=>$harga); 
		$data['pembayaran'] = $this->M_pelanggan->get_pembayaran($id,'tb_pembayaran')->result();
		$this->load->view('admin/detail_bayar',$data);
	}
	public function detail_plg($id)
	{
		$data['pelanggan'] = $this->M_pelanggan->get_pelanggan($id,'tb_pelanggan');
		$this->load->view('admin/detail_pelanggan',$data);
	}
	public function print($id)
	{
		$data['pembayaran'] = $this->M_pelanggan->get_detail_bayar($id,'tb_pembayaran')->result();
		$this->load->view('admin/print',$data);
	}
}
//end of file Admin.php
//location : application\controllers\