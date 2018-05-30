<?php 

namespace controller;

use app\Controller;
use app\View;
use model\Mahasiswa;
use model\Kategori;
/**
* 
*/
class SiteController extends Controller
{
	
	public function actionindex()
	{
		$mahasiswa = new Mahasiswa();
		$namaku = $mahasiswa->ambilSemua();

		View::render('utama',['nama'=>$namaku]);
	}
	public function actionlistkategori()
	{
		$kategori=new Kategori();
		$isi_kategori=$kategori->ambilSemua();
		View::render('kategori',['isi_kategori'=>$isi_kategori]);
	}
}

