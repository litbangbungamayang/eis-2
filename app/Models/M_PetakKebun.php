<?php

namespace App\Models;

use CodeIgniter\Model;

class M_PetakKebun extends Model{

  private $buma_env = "http://simpgbuma.ptpn7.com/index.php/api_bcn/";
  private $cima_env = "http://simpgcima.ptpn7.com/index.php/api_bcn/";
  private $lokal = "http://localhost/simpgbuma/api_bcn/";


  public function getServer($pg){
    $server_pg = null;
    switch($pg){
      case "buma":
        $server_pg = $this->buma_env;
        break;
      case "cima":
        $server_pg = $this->cima_env;
        break;
      case "lokal":
        $server_pg = $this->lokal;
        break;
    }
    return $server_pg;
  }

  public function getDataLuas($request){
    $pg = $request["pg"];
    $kepemilikan = $request["tstr"];
    $tahun_giling = $request["tahun_giling"];
    $query = "select sum(ptk.luas_ha) as luas from tbl_petak ptk where mature=? and kepemilikan=? and kode_plant=?";
    $arg = [$tahun_giling, $kepemilikan, $pg];
    //var_dump($request); die();
    return json_encode($this->db->query($query, $arg)->getResult());
  }

  public function getGroupingLuas($tahun_giling){
    $query = "select kode_plant, kepemilikan, sum(luas_ha) as luas from tbl_petak
              where mature=? group by kode_plant, kepemilikan";
    return json_encode($this->db->query($query, [$tahun_giling])->getResult());
  }

  public function getUnit($params){
    $tahun_giling = $params["tahun_giling"];
    $comp_code = $params["comp_code"];
    $query = "select kode_plant from tbl_petak where mature=? and company_code=? group by kode_plant";
    $arg = [$tahun_giling, $comp_code];
    return json_encode($this->db->query($query, $arg)->getResult());
  }

  function getCurl($request){
    $db_server = $request["db_server"];
    $url = str_replace(" ", "", $request["url"]);
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $db_server.$url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
      ),
    ));
    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);
    return $response; // output as json encoded
  }

  function serverRequest($pg,$req){
    $server_pg = null;
    switch($pg){
      case "buma":
        $server_pg = $this->buma_env;
        break;
      case "cima":
        $server_pg = $this->cima_env;
        break;
      case "lokal":
        $server_pg = $this->lokal;
        break;
    }
    $request = array("db_server"=>$server_pg, "url"=>$req);
    return ($this->getCurl($request));
  }

}
