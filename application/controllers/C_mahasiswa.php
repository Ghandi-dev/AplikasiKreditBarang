<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mahasiswa extends CI_Controller{
	
	function __construct(){ 
		parent::__construct(); 
		if($this->session->userdata('status') != "login_mhs"){
			redirect('Login/mahasiswa');
		}
	}
	public function index(){
		$this->load->view('mhs/mahasiswa');
	}
}