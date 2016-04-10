<?php
class CadastreSeController extends Nadeb_Controller_Front
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
		
		$form = new Site_Model_Signup();
		$this->view->form = $form->data_form();
	}
	
	public function sendAction()
	{
		$form = new Site_Model_Signup();
		$form->save( $this->_request->getPost() );
		
		$this->_redirect(__LINKS__ . 'cadastre-se/feedback');
	}
		
	public function feedbackAction()
	{
	}
}

