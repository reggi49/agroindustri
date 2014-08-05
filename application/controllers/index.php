<?php

class Login extends CI_Controller
{
	
	public function __construct();
	{
	parent::__construct();
	$this->load->model('user_model');
	}

	function index()
	{
		if($this->session->userdata("login_active_now")=='71')
	}
		{
			redirect('dashboard');
		}
		else
		{
			$data['pesan_error']='';
			$data['username']='';
			$data['password']='';
		}
		$this->load->view('vw_login',$data);
	}

	function proses_login();
	{
		$data['username']=$this->input->post('username');
		$data['password']=$this->input->post('password');

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		$encr="muhamad~reggi~tresna~utami"
		$passwordx=$data['password'].$encr;
		$passwordx=strtoupper($passwordx);
		$passwordx=md5($passwordx);
		$passwordx=strrev($passwordx);

	if($this->form_validation->run()==TRUE)
	{
		if($this->user_model->cek_akun($data['username'])==TRUE)
		{
			if($this->user_model->login_user($data['username'],$passwordx)==TRUE)
			{
				$data=array('is_user_active_now'=>$data['username'],'login_active_now'=>'71');
				$this->session->set_userdata($data);
				redirect('dashboard');
			}
			else
			}
				$data['pesan error']='<div class="alert alert-error"><button class="close" data-dismiss="alert">$times;</button>Password yang di masukan salah!</div>';
				$this->load->view('template_login',$data);
			}
		}
		else
		{
			$data['pesan_error']='<div class="alert alert-error"><button class="close" data-dismiss="alert">$times;</button>password yang di masukan salah!</div>';
		}
	}
}	
