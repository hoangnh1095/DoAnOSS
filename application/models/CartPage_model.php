<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CartPage_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function GetHoaDonByUser($user)
	{
		return $this->db->query("SELECT hoadon.idhd FROM hoadon WHERE hoadon.tenuser = '$user' AND hoadon.status=0")->row_array();
	}
	public function GetAoByUser($idAo)
	{
		$this->db->where('idao', $idAo);
		return $this->db->get('chitiethoadon')->result_array();
	}
	public function GetAoTuChitietDonHang($user)
	{
		return $this->db->query("SELECT * FROM ao , chitiethoadon , hoadon WHERE hoadon.tenuser = '$user' AND chitiethoadon.idhd = hoadon.idhd AND chitiethoadon.idao = ao.id AND hoadon.status=0")->result_array();
	}
	public function FinnishDH($id,$data)
	{
		$this->db->where('idhd', $id);
		return $this->db->update('hoadon',$data);
	}
}

/* End of file CartPage_model.php */
/* Location: ./application/models/CartPage_model.php */