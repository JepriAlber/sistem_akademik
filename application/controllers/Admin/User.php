<?php  
/**
 * 
 */
class User extends CI_Controller
{
	
	public function index()
	{
		$data['users'] 			= $this->User_model->Tampil_data('user')->result();
		$datajudul['judul']		= 'User';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/user',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function tambah_user()
	{
		$data 	= array(
			'username'		=> set_value('username'),
			'password' 		=> set_value('password'),
			'email'			=> set_value('email'),
			'level'			=> set_value('level'),
			'blokir'		=> set_value('blokir')
		);

		$datajudul['judul']		= 'Tambah Data User';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/form_user',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function tambah_user_aksi()
	{
		$this->_rules();

			if ($this->form_validation == FALSE) {
				$this->tambah_user();
			} else {

				$data 	= array(
					'username' 		=> $this->input->post('username', TRUE),
					'password'		=> md5($this->input->post('password',TRUE)),
					'email'			=> $this->input->post('email',TRUE),
					'level'			=> $this->input->post('level',TRUE),
					'blokir'		=> $this->input->post('blokir',TRUE),
					'id_session'	=> md5($this->input->post('id_session',TRUE))
				);

				$this->User_model->Input_data($data,'user');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data User Berhasil Ditambahkan</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/user'); 
			}
			
	}

	public function update($id)
	{
		$where			= array('id' => $id);
		$data['users']	= $this->User_model->show($where)->result();
		$datajudul['judul']		= 'Update Data User';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/edit_user',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function update_user_aksi()
	{
		$id 				= $this->input->post('id',TRUE);
		$username 			= $this->input->post('username',TRUE);
		$password 			= md5($this->input->post('password',TRUE));
		$email 				= $this->input->post('email',TRUE);
		$level 				= $this->input->post('level',TRUE);
		$blokir 			= $this->input->post('blokir',TRUE);
		$id_session 		= md5($this->input->post('id_session',TRUE));

			$data 			= array(
				'username'		=> $username,
				'password'		=> $password,
				'email'			=> $email,
				'level'			=> $level,
				'blokir'		=> $blokir,
				'id_session'	=> $id_session
			);

			$where 			= array(
				'id'			=>$id
			);

			$this->User_model->update_data($where,$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data User Berhasil Diupdate</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/user'); 
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'Username','required',[
			'required' 	=> 'Username Wajib Diisi!'
		]);
		$this->form_validation->set_rules('password', 'Password','required',[
			'required' 	=> 'Password Wajib Diisi!'
		]);
		$this->form_validation->set_rules('email', 'Email','required',[
			'required' 	=> 'Email Wajib Diisi!'
		]);
		$this->form_validation->set_rules('level', 'Level','required',[
			'required' 	=> 'Level Wajib Diisi!'
		]);
		$this->form_validation->set_rules('blokir', 'Blokir','required',[
			'required' 	=> 'Blokir Wajib Diisi!'
		]);
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->User_model->Hapus_data($where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data User Berhasil DiHapus</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/user'); 
	}

}
?>