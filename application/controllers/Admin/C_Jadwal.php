<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Jadwal extends CI_Controller {

/* ----------------------- VIEW LOAD ----------------------------*/
	
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Admin/M_admin');
		date_default_timezone_set("Asia/Bangkok");
	}


	public function index($status=false) {

		// generate all data jadwal
		$data['dokter'] = $this->M_admin->selectPegawai();
		$data['jadwal'] = $this->M_admin->selectJadwal();
	
		$this->load->view("V_Header");
		$this->load->view("V_Sidebar");
		$this->load->view("Admin/Jadwal/V_Index",$data);
		$this->load->view("V_Footer");
	}


	public function inputJadwal(){

		$data['dokter'] = $this->M_admin->selectPegawai();

		$this->load->view("V_Header");
		$this->load->view("V_Sidebar");
		$this->load->view("Admin/Jadwal/V_Input",$data);
		$this->load->view("V_Footer");	
	}

/* ----------------------- VIEW LOAD END ----------------------------*/


/* ----------------------- VIEW LOAD DETAIL -------------------------*/

public function jadwalDetail($id = false){
		
		$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$plaintext_string = $this->encrypt->decode($plaintext_string);

		$data['id_jadwal']	= $plaintext_string;
		$data['list'] = $this->M_admin->getJadwal($plaintext_string);
		$data['id'] = $id;

		$this->load->view("V_Header");
		$this->load->view("V_Sidebar");
		$this->load->view("Admin/Jadwal/V_Detail",$data);
		$this->load->view("V_Footer");

}

public function jadwalEdit($id = false){
		$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$plaintext_string = $this->encrypt->decode($plaintext_string);

		$data['id_jadwal']	= $plaintext_string;
		$data['list'] = $this->M_admin->getJadwal($plaintext_string);

	
		$this->load->view("V_Header");
		$this->load->view("V_Sidebar");
		$this->load->view("Admin/Jadwal/V_Edit",$data);
		$this->load->view("V_Footer");
}

/*------------------------ VIEW LOAD DETAIL END ----------------------*/

/* ----------------------- INSERT SECTION ----------------------------*/
	public function insertJadwal(){
		$id_dokter = $this->input->post('id_dokter');
		$bagian = $this->input->post('bagian');
		$hari = $this->input->post('hari');
		$time_awal = $this->input->post('time_awal');
		$time_akhir = $this->input->post('time_awal');
		$time = $time_awal." s/d ".$time_akhir;

		$data  = array(
				'id_dokter' => $id_dokter, 
				'bagian' => $bagian,
				'hari' => $hari,
				'jam' => $time
				);

		// echo "<pre>";
		// print_r($data);
		// exit();

		if($this->M_admin->insertJadwal($data)){
			redirect('Jadwal/index/simpan');
		}else{
			redirect('Jadwal/index/error');
		}
	}

/*------------------------------- UPDATE SECTION --------------------------------*/
	public function updateJadwal(){
		
		$id = $this->input->post('id_jadwal');
		$id_dokter = $this->input->post('id_dokter');
		$bagian = $this->input->post('bagian');
		$hari = $this->input->post('hari');
		$time_awal = $this->input->post('time_awal');
		$time_akhir = $this->input->post('time_awal');
		$time = $time_awal." s/d ".$time_akhir;

		$data  = array(
				'id_dokter' => $id_dok, 
				'bagian' => $bagian,
				'hari' => $hari,
				'jam' => $time
				);

		// echo "<pre>";
		// print_r($data);
		// exit();

		// echo "<pre>";
		// print_r($data);
		// exit();

		if($this->M_admin->updateJadwal($id,$data)){
			redirect('Jadwal/index/update');
		}else{
			redirect('Jadwal/index/error');
		}	
	}
/*-=-=-=-=-=-=-=-=-=--=-=-=-=-=- DELETE SECTION -=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= */

public function deleteJadwal($id){

		$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$plaintext_string = $this->encrypt->decode($plaintext_string);

		$id_dok	= $plaintext_string;

		if($this->M_admin->deleteJadwal($id_dok)){
			redirect('Jadwal/index/delete');
		}else{
			redirect('Jadwal/index/error');
		}	
	}

}
