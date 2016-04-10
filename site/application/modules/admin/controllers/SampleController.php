<?php
class Admin_SampleController extends Nadeb_Controller_Crud
{
	public function listAction()
    {
    	$this->view->search = $this->getModel()->search_form();
    	$this->view->html = $this->getModel()->data_grid( $this->_getAllParams() );
    	$this->renderScript("nadeb/response.phtml");
    }
}

