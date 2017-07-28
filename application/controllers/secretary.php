<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tables extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	// public function _example_output($output = null)
	// {
	// 	$this->load->view('welcome.php',(array)$output);
	// }

    public function secretary()
	{
			$crud = new grocery_CRUD();

$crud->set_theme('datatables');
			$crud->set_table('secretary');
			$crud->columns('secretary_id','secretary_site','secretary_form','secretary_addres','secretary_work','secretary_customer',
			'secretary_price', 'secretaryTenderOffers', 'secretaryPerformanceContract', 'secretaryDateStart', 'secretaryDateDownload',
			 'secretaryDateOver', 'secretaryDateAuction', 'secretaryDownloadDocument');

			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('secretary_id','Дата оголошень')	
				 ->display_as('secretary_site','Сайт')
				 ->display_as('secretary_form','Форма проведення закупiвлi')
				 ->display_as('secretary_addres','Адреса обєкту')
				 ->display_as('secretary_work','Види робiт')
				 ->display_as('secretary_customer','Замовник')
				 ->display_as('secretary_price','Вартiсть робiт по оголошенню тис.грн')
				 ->display_as('secretaryTenderOffers','Банкiвська гарантія тендерної пропозиції')	
				 ->display_as('secretaryPerformanceContract','Банківська гарантія виконання договору')
				 ->display_as('secretaryDateStart','Дата початку прийому пропозицій')
				 ->display_as('secretaryDateDownload','Дата завантаження пакету документів на прозоро')	
				 ->display_as('secretaryDateOver','Дата завершення прийому пропозицій')
				 ->display_as('secretaryDateAuction','Дата Аукціону')
				 ->display_as('secretaryDownloadDocument','Дата завантаження  документів на прозоро');
			$crud->set_subject('Секретарь');

			$output = $crud->render();

			$this->_example_output($output);
	}
}

?>