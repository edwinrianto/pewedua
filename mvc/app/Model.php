<?php 

namespace app;

use PDO;

/**
* Root model
*/
class Model
{
	 public $db;

	function __construct()
	{
		include_once 'config/main.php';
		try {
			$this->db = new \PDO('mysql:host='.$namahost.';dbname='.$dbname, $dbusername, $dbpassword);
			$this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (PDOException $e) {
			print "Terdapat Error Koneksi: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}