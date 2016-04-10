<?php
class Admin_Model_Sections extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Sections();
    	
    	parent::__construct();
	}
	
	public function data_grid()
	{
		$keys = new Admin_Model_Indexes();
		$keys->saveIndexes();
		
		$grid = new Nadeb_Data_Grid();
		$grid->title('Listagem de áreas do menu');
		$grid->totReg = count( $this->get_all() );
		$grid->tools['rel']      = __LINKS__ . 'admin/subsections/';
		$grid->tools['move']     = __LINKS__ . 'admin/'. $this->_params->controller .'/save-order/';
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/';
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Nome','Item sem conteúdo','Exibir');
		$grid->rows              = array(
										'name'   => 'tm250',
										'blankContent' => array('tm30',  'swap', __LINKS__ . 'admin/' . $this->_params->controller),
										'active' => array('tm30',  'swap', __LINKS__ . 'admin/' . $this->_params->controller)
									);
		
		return $grid->create_table( $this->get_all('order ASC') )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->title     ('Cadastro de áreas do menu');
		$form->set_data  ($this->get_one($id));
		$form->text      ('name','Titulo');
        $form->radio     ('blankContent','Item sem conteúdo',$this->typeOptions());
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
	
	public static function getAllSections()
	{
		$tb = new Application_Model_Db_Sections();
		$select = $tb->select()->where('active = 1')->order('order ASC');
		$data = $tb->fetchAll( $select );
		
		$result[0] = 'Selecione uma categoria';
		foreach ( $data as $value )
		{
			$result[$value['idSection']] = $value['name'];
		}
		
		return $result;
	}
	
}


