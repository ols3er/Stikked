<?php
/**
 * Class and Function List:
 * Function list:
 * - __construct()
 * - create()
 * Classes list:
 * - Api extends Main
 */
include_once ('application/controllers/main.php');

class Api extends Main
{
	
	function __construct() 
	{
		parent::__construct();
	}
	
	function create() 
	{
		$this->load->model('pastes');
		
		if (!$this->input->post('text')) 
		{
			$data['data'] = array(
				'error' => 'missing paste text',
			);
			$this->load->view('view/api', $data);
		}
		else
		{
			
			if (!$this->input->post('lang')) 
			{
				$_POST['lang'] = 'text';
			}
			$_POST['code'] = $this->input->post('text');
			$paste_url = $this->pastes->createPaste();
			$data['data'] = array(
				'url' => base_url() . $paste_url,
			);
			$this->load->view('view/api', $data);
		}
	}
}
