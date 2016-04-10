<?php
class Admin_Model_Signup extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Signup();
    	
    	parent::__construct();
	}
	
	public function data_grid()
	{
		$grid = new Nadeb_Data_Grid();
		$grid->title('Listagem de Cadastros');
		$grid->totReg = count( $this->get_all() );
		$grid->tools['move']     = __LINKS__ . 'admin/'. $this->_params->controller .'/save-order/';
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/';
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Nome', 'E-mail');
		$grid->rows              = array('name'   => '-', 'email'  => '-');
		
		return $grid->create_table( $this->get_all() )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->title     ('Inserção de Cadastros');
		$form->set_data  ($this->get_one($id));
		$form->text      ('name','Nome');
		$form->text      ('email','E-mail');
		$form->text      ('city','Cidade');
		$form->text      ('state','Estado');
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
	
}


