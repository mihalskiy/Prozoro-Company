<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index($output = null)
	{
        $this->load->view('table', $output);
	}
}
