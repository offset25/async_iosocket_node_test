<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		// load base_url
		$this->load->helper('url');
	}

	public function index()
	{
		// Check form submit or not
		if ($this->input->post('upload') != NULL) {

			$data = array();

			// Count total files
			$countfiles = count($_FILES['files']['name']);

			// Looping all files
			for ($i = 0; $i < $countfiles; $i++) {

				if (!empty($_FILES['files']['name'][$i])) {

					// Define new $_FILES array - $_FILES['file']
					$_FILES['file']['name'] = $_FILES['files']['name'][$i];
					$_FILES['file']['type'] = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['files']['error'][$i];
					$_FILES['file']['size'] = $_FILES['files']['size'][$i];

					// Set preference
					$config['upload_path'] = 'uploads/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = '5000'; // max_size in kb
					$config['file_name'] = $_FILES['files']['name'][$i];

					//Load upload library
					$this->load->library('upload', $config);

					// File upload
					if ($this->upload->do_upload('file')) {
						// Get data about the file
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];

						$this->db->insert('images',array('name'=>$filename));

						// Initialize array
						$data['filenames'][] = $filename;
					}
				}

			}

			$this->db->select('*');
			$this->db->from('images');
			$query = $this->db->get();
			$images_data = $query->result_array();

			$this->load->view('user_view',array('images'=>$images_data));
		} else {

			$this->db->select('*');
			$this->db->from('images');
			$query = $this->db->get();
			$images_data = $query->result_array();


			$this->load->view('user_view',array('images'=>$images_data));
		}

	}
}
