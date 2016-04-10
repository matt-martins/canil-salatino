<?php
class Admin_Model_Contact extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Contact();
    	
    	parent::__construct();
	}
	
	public function data_grid()
	{
		$grid = new Nadeb_Data_Grid();
		$grid->title('Listagem de Contatos');
		$grid->totReg = count( $this->get_all() );
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/';
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Assunto', 'Nome', 'E-mail');
		$grid->rows              = array(
									'subject' => 'tm100', 
									'name'    => '-', 
									'email'   => 'tm150');
		
		return $grid->create_table( $this->get_all() )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->title     ('Cadastro de Contatos');
		$form->set_data  ($this->get_one($id));
		$form->select    ('subject','Assunto', $this->subjectsOptions());
		$form->text      ('name','Nome');
		$form->text      ('email','E-mail');
		$form->text      ('city','Cidade');
		$form->text      ('state','Estado');
		$form->textarea  ('message','Mensagem');
		$form->checkbox  ('optIn','Aceita receber novidades', array('1' => 'Sim'));
        $form->fieldset  ('buttons');
        $form->submit    ('btn_save','salvar');
        $form->button    ('btn_cancel','cancelar');
        
		if( $post )
        {
        	$result = $this->save($id, $post, $form);
        	return $result['message'];
        }
        else
        {
        	return $form->create_form()->get();
        }
	}
	
	public function subjectsOptions()
	{
		$subjects = array(
				'Italian'     => 'Italian',
				'Saluki'      => 'Saluki',
				'Papillom'    => 'Papillom',
				'Teckel'      => 'Teckel',
				'Chinese'     => 'Chinese',
				'Hospedagem'  => 'Hospedagem',
				'Restaurante' => 'Restaurante',
				'Outros'      => 'Outros'
		);
	
		return $subjects;
	}
	
}


