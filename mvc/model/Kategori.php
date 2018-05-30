<?php 

namespace model;

use app\Model;


/**
* 
*/
class Kategori extends Model
{
	public function ambilSemua()
	{
		$query=$this->db->prepare("SELECT * FROM Kategori");
		$query->execute();
		$data=$query->fetchAll();
		return $data;
	}
}
