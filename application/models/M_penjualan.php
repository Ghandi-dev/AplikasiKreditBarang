<?php 
/**
 * 
 */
class M_penjualan extends CI_Model{
	//method yang dibuat di controller (Admin.php)
	public function tampil_data(){
	//pemanggilan data yang berada di tabel tb_mahasiswa
    $this->db->select('tb_pelanggan.kode_pelanggan,nama_pelanggan,nama_barang,harga_barang,nama_toko');
    $this->db->from('tb_penjualan');
    $this->db->join('tb_pelanggan','tb_penjualan.kode_pelanggan=tb_pelanggan.kode_pelanggan');
	return $this->db->get();

	}
    public function pelanggan()
    {
        return $this->db->get('tb_pelanggan');
    }

	//method yang dibuat di controller (Admin.php)
	public function input_data($tabel,$data){
		//memasukan data inputan ke tabel tb_mahasiswa
		$this->db->insert($tabel, $data);
	}

	//method yang dibuat di controller (Admin.php) untuk menghapus data
	public function hapus_data($where, $tabel){
		$this->db->where($where);
		//menghapus data dari tabel tb_mahasiswa
		$this->db->delete($tabel);
	}

	//method yang dibuat di controller (Admin.php) untuk merubah data 
	public function edit_data($where, $table){
		//merubah data dari tabel tb_mahasiswa 
	return $this->db->get_where($table, $where);
		}
	
	//method yang dibuat di controller (Admin.php) untuk mengupdate data 
	public function update_data($where,$data,$table){
		$this->db->where($where);
		//mengupdate data dari tabel tb_mahasiswa
		$this->db->update($table,$data);
	}

}

//end of file M_mahasiswa.php
//location application\model