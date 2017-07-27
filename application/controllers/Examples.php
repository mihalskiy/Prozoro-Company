<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('index.php',(array)$output);
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

		public function secretary()
	{
			$crud = new grocery_CRUD();

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


	public function adminTable()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('admin');
			$crud->columns('adminParticipants','adminInputPrice', 'adminWinner', 'adminPriceWinner', 'adminDerectorDataStart',
			 'adminDerectorDataWork', 'adminDerectorDataFinish', 'adminDateStartWork', 'adminBrigadier', 
			  'adminDateReceivingManeyAct', 'adminDateReceivingManeyAct2', 'adminDateMeney');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('adminParticipants','Нашi Учасники')	
				 ->display_as('adminInputPrice','Наша вхiдна цiна тис.грн')
				 ->display_as('adminWinner','Переможець')
				 ->display_as('adminPriceWinner','Сума перемого тис.грн')
				 ->display_as('adminDerectorDataStart','Дата укладання договору')
				 ->display_as('adminDerectorDataWork','Орієнтовна дата початку робіт')
				 ->display_as('adminDerectorDataFinish','Орієнтовний термін закінчення робіт')
				 ->display_as('adminDateStartWork','Дата початку робіт')
				 ->display_as('adminBrigadier','Бригадир')
				 ->display_as('adminDateReceivingManeyAct','Дата отримання коштів за актом №1')
				 ->display_as('adminDateReceivingManeyAct2','Дата отримання коштів за актом №2')
				 ->display_as('adminDateMeney','Загальна вартість за актом виконаних робіт, тис.грн');
			$crud->set_subject('Директор');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function calculators()
	{
		$crud = new grocery_CRUD();

			$crud->set_table('calculator');
			$crud->columns('calculatorDateTransmission','calculatorDownloadFile', 'calculatorTypeAct', 'calculatorDateTransmissionAct', 
			'calculatorDateTransmissionAllPackeg', 'calculatorDateTransmissionAct2','calculatorDateTransmissionAllAct2', 'calculatorOverWork', 
			'calculatorDateTransmissionOverAct', 'calculatorDateTransmissionAllDocument', 'calculatorAllPrice');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('calculatorDateTransmission','Дата передачі пакету документів кошторисником')	
				 ->display_as('calculatorDownloadFile','Завантаження документів которисника для кваліфікації')
				 ->display_as('calculatorTypeAct','Тип акту')
				 ->display_as('calculatorDateTransmissionAct','Дата передачі акту №1 на перевірку згідно журналу')
				 ->display_as('calculatorDateTransmissionAllPackeg','Дата передачі повного пакету документів по акту №1 замовнику')
				 ->display_as('calculatorDateTransmissionAct2','Дата передачі акту №2 на перевірку згідно журналу')
				 ->display_as('calculatorDateTransmissionAllAct2','Дата передачі повного пакету документів по акту №2 замовнику')
				 ->display_as('calculatorOverWork','Дата закінчення робіт')
				 ->display_as('calculatorDateTransmissionOverAct','Дата передачі заключного акту на перевірку згідно журналу')
				 ->display_as('calculatorDateTransmissionAllDocument','Дата передачі повного пакету документів замовнику')
				 ->display_as('calculatorAllPrice','Загальна вартість за актом виконаних робіт, тис.грн');
			$crud->set_subject('Кошторисник');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	public function accountants()
	{
		$crud = new grocery_CRUD();

			$crud->set_table('accountant');
			$crud->columns('accountantDateTransmission','accountantBankGuarantee', 'accountantDateReturnbankguarantee', 
			'accountantDateReceivingMoney', 'accountantDateReceivingAdvance', 'accountantDateReturnBankGarante');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('accountantDateTransmission','Дата передачі банківської гарантії тендерної пропозиції')	
				 ->display_as('accountantBankGuarantee','Банківська гарантія для заключення договору')
				 ->display_as('accountantDateReturnbankguarantee','Дата повернення банківської гарантії тендерної пропозиції')
				 ->display_as('accountantDateReceivingMoney','Дата отримання коштів мешканців')
				 ->display_as('accountantDateReceivingAdvance','Дата отримання авансу')
				 ->display_as('accountantDateReturnBankGarante','Дата повернення банківської гарантії викнання договору');
			$crud->set_subject('Бухгалтер');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function lawyers()
	{
		$crud = new grocery_CRUD();
			
			$crud->set_theme('datatables');
			$crud->set_table('lawyer');
			$crud->set_subject('Юрист');
			$crud->required_fields('Дата');
			$crud->set_field_upload('lawyerDownloadDocument','assets/uploads/files');
			$crud->display_as('lawyerDateFile','Дата передачі пакету документів юристом')
				 ->display_as('lawyerDownloadDocument','Завантаження документів для кваліфікації')
				 ->display_as('lawyerDateDownloadFile',' Дата завантаження документів для кваліфікації');

			$output = $crud->render();

			$this->_example_output($output);
	}

	function multigrids()
	{
		
$crud = new grocery_CRUD();
$crud->set_table('calculator');
  $crud->set_relation('calculator_id', 'calculatorDownloadFile', 'calculatorDateTransmission');
  // other 1 to n relations between you tables
  $output = $crud->render();
  $this->_example_output($output);

	}

}
