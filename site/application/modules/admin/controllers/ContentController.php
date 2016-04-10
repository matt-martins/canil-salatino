<?php
class Admin_ContentController extends Nadeb_Controller_Crud
{
	public function listAction()
	{
		$this->view->search = $this->getModel()->search_form();
		$this->view->html = $this->getModel()->data_grid( $this->_getAllParams() );
		$this->renderScript("nadeb/response.phtml");
	}
	
	public function getSubsectionAction()
	{
		$sub = new Admin_Model_Subsections();
		
		$this->view->html = Zend_Json::encode( $sub->getSubsections( $this->_getParam('id') ) );
		$this->renderScript("nadeb/response.phtml");
	}
}

