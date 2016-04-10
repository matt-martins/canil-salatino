<?php
class Site_Model_Signup
{
	public function __construct()
	{
		$this->tb = new Application_Model_Db_Signup();
	}
	
	public function _form()
	{
		$form = new Nadeb_Data_Form('form');
		$form->form_action = __LINKS__ . 'cadastre-se/send';
		$form->set_data  (null);
		$form->text      ('name','Nome');
		$form->text      ('email','E-mail');
		$form->select    ('state','Estado', null);
		$form->select    ('city','Cidade', null);
		$form->checkbox  ('optIn','', array('1' => 'Desejo receber novidades do Canil Salatino'), 1);
		$form->fieldset  ('buttons');
		$form->submit    ('btn_save','enviar');
		
		return $form;
	}
		
	public function data_form()
	{
		return $this->_form()->create_form()->get();
	}
		
	public function save($post)
	{
		$data = $this->_form()->get_dataToInsert($post, null);
		
		$this->tb->insert( $data );
	}
	
}


