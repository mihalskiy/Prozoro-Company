<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {
public function __construct()
{
  parent::__construct();
  $this->load->database();
  $this->load->helper('url');
  $this->load->library('grocery_CRUD');
}
public function index()
{
  echo '<h1>Добро пожаловать в мир grocery CRUD!</h1>'; // Просто, чтобы убедиться, что наш контроллер работает
  die();
}
public function secretary()
{
  $this->grocery_crud->set_table('secretary');
  $output = $this->grocery_crud->render();
  $this->_example_output($output);
}
public function _example_output($output = null)
{
  $this->load->view('example.php', $output);
}
}
/* End of file main.php */
/* Location: ./application/controllers/main.php */