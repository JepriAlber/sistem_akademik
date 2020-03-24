<?php  
/**
 * 
 */
class Auth extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Halama Login Admin';

			$this->load->view('auth/header',$data);
			$this->load->view('auth/form_login');
			$this->load->view('auth/footer');
	}

	public function proses_login()
	{

		$this->form_validation->set_rules('username','Username','required',[
			'required' => 'Username Wajib diisi!'
		]);
		$this->form_validation->set_rules('password','Password','required',[
			'required' => 'Password Wajib diisi!'
		]);

		if ($this->form_validation->run()==FALSE) {
			$data['judul'] = 'Halama Login Admin';
				$this->load->view('auth/header',$data);
				$this->load->view('auth/form_login');
				$this->load->view('auth/footer');
		}else{
			$username = $this->input->post('username',true);
			$password = $this->input->post('password',true);

				$user = $username;
				$pass = md5($password);

				$cek = $this->Login_model->cek_login($user,$pass);

				if ($cek->num_rows() > 0) {

					foreach ($cek->result() as $ck) {
						$sess_data['username'] = $ck->username;
						$sess_data['email'] = $ck->email;
						$sess_data['level'] = $ck->level;

						$this->session->set_userdata($sess_data);
					}

					if ($sess_data['level']=='admin') {
						redirect('admin/dashboard');
					}else{
						$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
										              <strong>Username atau Password </strong> Salah!
										              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										                <span aria-hidden="true">&times;</span>
										              </button>
										            </div>');
						redirect('admin/auth');
					}
					
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
									              <strong>Username atau Password </strong> Salah!
									              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									                <span aria-hidden="true">&times;</span>
									              </button>
									            </div>');
						redirect('admin/auth');
				}

		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/auth');
	}

}
?>