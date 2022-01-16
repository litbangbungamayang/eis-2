<?php

namespace App\Controllers;

class C_petak_kebun extends BaseController
{
	public function index()
	{
		return view('petak_kebun');
	}

	public function overview(){
		return view('onfarm_overview');
	}

	public function getDataLuas(){
		$this->model_petakKebun = model("M_PetakKebun");
		$pg = $this->request->getGet("pg");
		$tahun_giling = $this->request->getGet("tahun_giling");
		$kepemilikan = $this->request->getGet("tstr");
		$params = array(
			"pg" => $pg,
			"tahun_giling" => $tahun_giling,
			"tstr" => $kepemilikan
		);
		echo $this->model_petakKebun->getDataLuas($params);
	}

	public function getGroupingLuas(){
		$this->model_petakKebun = model("M_PetakKebun");
		$tahun_giling = $this->request->getGet("tahun_giling");
		echo $this->model_petakKebun->getGroupingLuas($tahun_giling);
	}

	public function getUnit(){
		$this->model_petakKebun = model("M_PetakKebun");
		$tahun_giling = $this->request->getGet("tahun_giling");
		$comp_code = "7BCN";
		$params = array(
			"tahun_giling" => $tahun_giling,
			"comp_code" => $comp_code
		);
		echo $this->model_petakKebun->getUnit($params);
	}

	public function getAllPetak(){
		$this->model_petakKebun = model("M_PetakKebun");
		$pg = $this->request->getGet("pg");
		$tahun_giling = $this->request->getGet("tahun_giling");
		$params = array(
			"pg" => $pg,
			"tahun_giling" => $tahun_giling
		);
		echo $this->model_petakKebun->getAllPetak($params);
	}

}


?>
