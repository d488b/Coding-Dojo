<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function index()
	{
		$this->load->library('form_validation');
		$data['title'] = "Log In/Reg";
		$this->load->view('header', $data);
		$this->load->view('loginreg');
		$this->load->view('footer');
	}
	public function register()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]|xss_clean');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[confpass]|xss_clean');
		$this->form_validation->set_rules('confpass', 'Confirm Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Log In/Reg";
			$this->load->view('header', $data);
			$this->load->view('loginreg');
			$this->load->view('footer');
		}
		else
		{
			$this->load->model('user');

			$user = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => $this->encrypt->encode($this->input->post('password')),
				'created_at' => date("Y-m-d h:i:s")
				);
			$this->user->insert_user($user);

			$data['message'] = "Successfully registered";
			$data['title'] = "Log In/Reg";
			$this->load->view('header', $data);
			$this->load->view('loginreg', $data);
			$this->load->view('footer');
		}
	}

	public function login()
	{
		$this->load->model('user');
		$user = array(
			"email" => $this->input->post('email'),
			"password" => $this->input->post('password')
			);

		$user = $this->user->login($user);
		if($user == null)
		{
			$data['message'] = "Bad email/password";
			$this->load->library('form_validation');
			$data['title'] = "Log In/Reg";
			$this->load->view('header', $data);
			$this->load->view('loginreg');
			$this->load->view('footer');
		}
		else
		{
			$this->session->set_userdata('user', $user);
			$this->load->library('form_validation');
			$data['title'] = "Success page";
			$data['user'] = $user;
			$this->load->view('header', $data);
			$this->load->view('success', $data);
			$this->load->view('footer');
		}
	}

	public function logout($value, $second)
	{
		$this->session->sess_destroy();
		redirect(base_url('users/index'));
	}
}