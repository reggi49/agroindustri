<?php

class Login extends CI_Controller
{
	function index()
	{
		$data['main_content']='login_form';
		$this->load->view('template',$data);
	}
	function proses_login()
	{
		$this->load->model('member_model');
		$query=$this->member_model->validate();

		if($query)
		{
			$data=array(
				'username' =>$this->input->post('username'),
				'is_logged_in'=>true
				);
				$this->session->set_userdata($data);
				redirect('site/home');
		}
		else
		
			?>
				<script type="text/javascript" language="javascript">
				alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
				</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
		
	}
	function signup()
	{
		$data['main_content']="signup_form";
		$this->load->view('template',$data);
	}
	function create_member()
	{
		$this->load->library('form_validation');

		//mari kita mulai
		$this->form_validation->set_rules('npm','npm','trim|required');
		$this->form_validation->set_rules('nama','nama','trim|required');
		$this->form_validation->set_rules('username','username','trim|required|min_length[4]');
		$this->form_validation->set_rules('password','password','trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2','password confirmation','trim|required|matches[password]');
		$this->form_validation->set_rules('email','email','trim|required|valid_email');
	
		if($this->form_validation->run()== FALSE)
		{
			$this->load->view('signup_form');
		}

		else
		{
			$this->load->model('member_model');
			if($query=$this->member_model->create_member())
			{
				$data['main_content']='signup_berhasil';
				$this->load->view('template',$data);
			}
			else
			{
				$this->load->view('template');
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

	function kontak_us()
	{
		$this->load->library('form_validation');
    	$this->form_validation->set_rules('name', 'Nama', 'trim|required');
    	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    	$this->form_validation->set_rules('subject','Subjek','trim|required');
    	$this->form_validation->set_rules('content', 'Pesan', 'trim|required|xss_clean');

    	if($this->form_validation->run() == FALSE) {
        $this->load->view('kontak');
    	} else {
        $this->load->library('email');
        $this->email->from($this->input->post('email'), $this->input->post('name'));
        $this->email->to('example@gmail.com');
        $this->email->subject('Contact form');
        $this->email->message($this->input->post('content'));
        $this->email->send();
        $this->load->view('contact_submit');
    	}
	}
	
}
