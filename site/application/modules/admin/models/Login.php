<?php
class Admin_Model_Login extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$header      = Nadeb_HeaderController::get_instance();
		$header->css = "library/Nadeb/Components/TemplateBlue/css/reset.css";
		$header->css = "library/Nadeb/Components/TemplateBlue/css/style.css";
		
    	$this->tb = new Application_Model_Db_Users();
    	
    	parent::__construct();
	}
	
	public function data_form_login()
	{
    	$header      = Nadeb_HeaderController::get_instance();
		$header->css = "library/Nadeb/Components/TemplateBlue/css/forms.css";
		$header->css = "library/Nadeb/Components/TemplateBlue/css/login.css";
		
		
		$form = new Nadeb_Data_Form('login');
		$form->form_action = __LINKS__ . 'admin/login/sigin/';
		$form->set_prefix('usr');
		$form->text      ('email','E-mail');
        $form->password  ('password','Senha');
        $form->submit    ('btn_login','Entrar');
        
       	return $form->create_form()->get();
	}
	
	public function validate($usr, $psw)
	{
    	$filter = new Zend_Filter_StripTags();
		$auth = new Nadeb_ZendAuth_Adapter($filter->filter( $usr ), $filter->filter( $psw ));
		$result = $auth->authenticate();
	}
	
	public function sign_out()
	{
		$auth = new Nadeb_ZendAuth_Adapter();
		$auth->unAuthenticate();
	}
	
}


















