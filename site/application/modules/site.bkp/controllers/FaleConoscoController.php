<?php
class FaleConoscoController extends Nadeb_Controller_Front
{

	public function init()
	{
		parent::init();
		$this->view->banner = Site_Model_Banners::getbanner();
	}

	public function indexAction()
	{
		$header      = Nadeb_HeaderController::get_instance();
		$header->js  = "library/Nadeb/Components/Javascript/jquery_plugins/stateCity.js";

		$form = new Site_Model_Contact();
		$this->view->form = $form->data_form();
	}

	public function sendAction()
	{
		$form = new Site_Model_Contact();
		$form->save( $this->_request->getPost() );

		$this->_redirect(__LINKS__ . 'fale-conosco/feedback');
	}

	public function formTesteAction()
	{
		$form = new Nadeb_Data_Form('form');
		$form->form_action = __LINKS__ . 'fale-conosco/send-teste';
		$form->set_data  (null);
		$form->text      ('name','Nome');
		$form->text      ('email','E-mail');
		$form->textarea  ('message','Mensagem');
		$form->fieldset  ('buttons');
		$form->submit    ('btn_save','enviar');

		$this->view->form = $form->create_form()->get();
	}


	public function sendTesteAction()
	{
		$send = new Site_Model_SendMail();
		$send->teste( $this->_request->getPost() );

		$this->_redirect(__LINKS__ . 'fale-conosco/feedback');
	}


	public function feedbackAction()
	{
	}
}

