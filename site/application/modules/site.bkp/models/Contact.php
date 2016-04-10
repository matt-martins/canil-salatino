<?php
class Site_Model_Contact
{
	public function __construct()
	{
		$this->tb = new Application_Model_Db_Contact();
	}
	
	public function _form()
	{
		$form = new Nadeb_Data_Form('form');
		$form->form_action = __LINKS__ . 'fale-conosco/send';
		$form->set_data  (null);
		$form->select    ('subject','Assunto', $this->subjectsOptions());
		$form->text      ('name','Nome');
		$form->text      ('email','E-mail');
		$form->select    ('state','Estado', null);
		$form->select    ('city','Cidade', null);
		$form->textarea  ('message','Mensagem');
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
		
		$send = new Site_Model_SendMail();
		$send->contact($post);
		
		$this->tb->insert( $data );
	}
	
	public function subjectsOptions()
	{
		$subjects = array(
			'Italian'     => 'Italian',
			'Saluki'      => 'Saluki',
			'Papillon'    => 'Papillon',
			'Teckel'      => 'Teckel',
			'Chinese'     => 'Chinese',
			'Hospedagem'  => 'Hospedagem',
			'Restaurante' => 'Restaurante',
			'Outros'      => 'Outros'
		);
		
		return $subjects;
	}
	
	public static function getEmails($key)
	{
		$subjects = array(
			'Italian'     => 'salatino@salatino.com.br',
			'Saluki'      => 'salatino@salatino.com.br',
			'Papillon'    => 'salatino@salatino.com.br',
			'Teckel'      => 'salatino@salatino.com.br',
			'Chinese'     => 'salatino@salatino.com.br',
			'Hospedagem'  => 'salatino@salatino.com.br',
			'Restaurante' => 'canilsalatino@terra.com.br',
			'Outros'      => 'salatino@salatino.com.br'
		);
		
		return $subjects[$key];
	}
	
}


