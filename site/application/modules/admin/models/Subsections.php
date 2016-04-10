<?php
class Admin_Model_Subsections extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Subsections();
    	
    	$keys = new Admin_Model_Indexes();
    	$keys->saveIndexes();
    	
    	parent::__construct();
	}
	
	public function data_grid()
	{
		$grid = new Nadeb_Data_Grid();
		$grid->title('Listagem de áreas do sub-menu');
		$grid->totReg = count( $this->get_all() );
		$grid->tools['move']     = __LINKS__ . 'admin/'. $this->_params->controller .'/save-order/';
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( $this->_params->rel ? 'rel/' .  $this->_params->rel : '' );
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Nome','Exibir');
		$grid->rows              = array(
										'name'   => 'tm250',
										'active' => array('tm30',  'swap', __LINKS__ . 'admin/' . $this->_params->controller)
									);
		
		return $grid->create_table( $this->get_all('order ASC', 'idSection = ' . $this->_params->rel ) )->get();
	}
	
	public function data_form($id = null, $post)
	{
		
		
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->title     ('Cadastro de áreas do menu');
		$form->set_data  ($this->get_one($id));
		$form->hidden    ('idSection',$this->_params->rel);
		$form->text      ('name','Titulo');
        $form->radio     ('active','Exibir',$this->typeOptions());
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
	
	public function typeOptions()
	{
		return array('1' => 'Sim', '0' => 'Não');
	}
	
	public function getSubsections($id)
	{
		$data = $this->get_all( 'order ASC', 'active = 1 AND idSection = ' . $id);
		
		return $data;
	}
}


