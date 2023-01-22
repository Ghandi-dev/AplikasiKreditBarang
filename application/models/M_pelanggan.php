<?php 
/**
 * 
 */
class M_pelanggan extends CI_Model{
	//method yang dibuat di controller (Admin.php)
	public function tampil_data($tabel){
		$segment = $this->uri->segment(2);
		if($segment == 'index' || $tabel == 'tb_pelanggan'){
			//pemanggilan data yang berada di tabel tb_mahasiswa
			return $this->db->get($tabel);
		}elseif($segment == 'penjualan'){
			$this->db->select('tb_pelanggan.kode_pelanggan,kode_penjualan,nama_pelanggan,nama_barang,harga_beli,harga_jual,nama_toko');
			$this->db->from($tabel);
			$this->db->join('tb_pelanggan','tb_penjualan.kode_pelanggan=tb_pelanggan.kode_pelanggan');
			$this->db->order_by('nama_pelanggan','ASC');
			return $this->db->get();
		}elseif($segment = 'pembayaran'){
			$this->db->select('tb_penjualan.kode_penjualan, nama_pelanggan, nama_barang, harga_jual');
			$this->db->from($tabel);
			$this->db->join('tb_pelanggan','tb_penjualan.kode_pelanggan=tb_pelanggan.kode_pelanggan','right');
			$this->db->order_by('nama_pelanggan','ASC');
			$this->db->where('tb_penjualan.kode_penjualan != "" ');
			return $this->db->get();
		}
	}

	//method yang dibuat di controller (Admin.php)
	public function input_data($tabel,$data){
		//memasukan data inputan ke tabel tb_mahasiswa
		$this->db->insert($tabel, $data);
	}

	//method yang dibuat di controller (Admin.php) untuk menghapus data
	public function hapus_data($id,$segment, $tabel){
		if ($segment == 'index') {
			# code...
			$this->db->where('kode_pelanggan',$id);
			//menghapus data dari tabel tb_mahasiswa
			$this->db->delete($tabel);
		}elseif ($segment == 'penjualan') {
			$this->db->where('kode_penjualan',$id);
			//menghapus data dari tabel tb_mahasiswa
			$this->db->delete($tabel);
		}elseif ($segment == 'detail') {
			$this->db->where('kode_pembayaran',$id);
			//menghapus data dari tabel tb_mahasiswa
			$this->db->delete($tabel);
		}
	}

	//method yang dibuat di controller (Admin.php) untuk merubah data 
	public function edit_data($id, $table, $segment){
		if($segment=='penjualan'){
			$this->db->select('kode_penjualan,tb_pelanggan.kode_pelanggan,nama_pelanggan,nama_barang,harga_beli,harga_jual,nama_toko');
			$this->db->from('tb_penjualan');
			$this->db->join('tb_pelanggan','tb_penjualan.kode_pelanggan=tb_pelanggan.kode_pelanggan');
			$this->db->where('kode_penjualan',$id);
			return $this->db->get()->row();
		}elseif($segment=='index'||$table == 'tb_pelanggan'){
			$where = array('kode_pelanggan' =>$id);
			//merubah data dari tabel tb_mahasiswa 
			return $this->db->get_where($table, $where)->row();
		}elseif ($segment == 'detail') {
			$this->db->select('tb_penjualan.harga_jual,tb_pembayaran.*');
			$this->db->from($table);
			$this->db->join('tb_penjualan','tb_penjualan.kode_penjualan = tb_pembayaran.kode_penjualan','left');
			$this->db->where('kode_pembayaran',$id);
			return $this->db->get()->row();
		}
	}
	
	//method yang dibuat di controller (Admin.php) untuk mengupdate data 
	public function update_data($where,$data,$table){
		$this->db->where($where);
		//mengupdate data dari tabel tb_mahasiswa
		$this->db->update($table,$data);
	}
	public function get_pembayaran($id,$tabel)
	{
		$this->db->select($tabel.'.*,tb_penjualan.kode_penjualan,nama_pelanggan,nama_barang,harga_jual');
		$this->db->from($tabel);
		$this->db->join('tb_penjualan','tb_penjualan.kode_penjualan = tb_pembayaran.kode_penjualan','right');
		$this->db->join('tb_pelanggan','tb_penjualan.kode_pelanggan = tb_pelanggan.kode_pelanggan','right');
		$this->db->where($tabel.'.kode_penjualan',$id);
		return $this->db->get();
	}
	public function get_pelanggan($id,$tabel)
	{
		$this->db->where('kode_pelanggan',$id);
		return $this->db->get($tabel)->row();
	}
	public function get_detail_bayar($id,$tabel)
	{
		$this->db->select($tabel.'.*,nama_pelanggan,nama_barang');
		$this->db->from($tabel);
		$this->db->join('tb_penjualan','tb_penjualan.kode_penjualan = tb_pembayaran.kode_penjualan','right');
		$this->db->join('tb_pelanggan','tb_penjualan.kode_pelanggan = tb_pelanggan.kode_pelanggan','right');
		$this->db->where($tabel.'.kode_penjualan',$id);
		return $this->db->get();
	}
	public function foto($id)
	{
		$this->db->select('foto_ktp');
		$this->db->where('kode_pelanggan',$id);
		return $this->db->get('tb_pelanggan')->row();

	}
	// public function detail2($id,$tabel)
	// {
	// 	$this->db->select('kode_penjualan');
	// 	$this->db->from($tabel);
	// 	$this->db->where('kode_penjualan',$id);
	// 	return $this->db->get()->row();
	// }

}

//end of file M_mahasiswa.php
//location application\model