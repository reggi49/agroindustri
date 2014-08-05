<?php

class Site extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	
	function home()
	{
		$this->load->view('home');
	}

	function is_logged_in()
	{
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_logged_in!==true)
		{
			echo 'kamu tidak memiliki izin memasuki halaman ini.<a href="../login">Kembali</a>';
			
			die();
		}
	}

}