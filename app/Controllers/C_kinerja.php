<?php

namespace App\Controllers;

class C_kinerja extends BaseController
{
	public function index()
	{
		//return view('welcome_message');
		//return view('main_page');
		//$data['pageTitle'] = 'Dashboard BCN';
		//echo view('Templates/main_layout', $data);
		//echo view('Templates/footer');
		//$this->load->view('Templates/upper_navbar', $data);
		//return view('Templates/app_layout', $data);
		return view('kinerja');
	}

	public function getTargetKinerja(){
		$kategori = $this->request->getGet('kat');
		$pg = $this->request->getGet('pg');
		$this->model_dashboard = model("M_Dashboard");
		echo ($this->model_dashboard->getTargetKinerja($kategori, $pg));
	}

	public function khusus(){
		return view('data_khusus');
	}

	public function getDataKhusus(){
		$this->model_dashboard = model("M_Dashboard");
		$request = $this->request->getGet('tgl');
		echo $this->model_dashboard->getDataKhusus($request);
	}

	public function getDataKhususSd(){
		$this->model_dashboard = model("M_Dashboard");
		$request = $this->request->getGet('tgl');
		echo $this->model_dashboard->getDataKhususSd($request);
	}

}


?>
