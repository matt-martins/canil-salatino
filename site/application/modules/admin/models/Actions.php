<?php
class Admin_Model_Actions extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Actions();
    	
    	parent::__construct();
	}
	
	
	public function get_all($_order = null)
	{
		$data = $this->tb->fetchAll( 'idController = ' . $this->_params->rel, $_order )->toArray();
		
    	return $data;
	}
	
	public function data_grid()
	{
		$grid = new Nadeb_Data_Grid();
		$grid->totReg = count( $this->get_all() );
		$grid->tools['move']     = __LINKS__ . 'admin/'. $this->_params->controller .'/save-order/';
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/rel/' . $this->_params->rel . '/';
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Nome', 'Link', 'Tipo de ação');
		$grid->rows              = array('name' => 'tm150', 'link' => 'tm150', 'taskType' => '-');
		
		return $grid->create_table( $this->get_all('order ASC') )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->set_data  ($this->get_one($id));
		$form->hidden    ('idController', $this->_params->rel);
		$form->text      ('name','Nome');
		$form->text      ('link','Link', 'admin/'. $this->_params->controller .'/[ação]/');
        $form->checkbox  ('taskType','Ação',$this->taskType_options());
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
	
	private function taskType_options()
	{
		$array = Array(
			'read' => 'leitura',
			'write' => 'escrita'
		);
		
		return $array;
	}
	
	public function insertSampleActions($idController, $name)
	{
		$data1 = Array
				(
					'idController' => $idController,
					'name'         => 'Listar',
					'link'         => 'admin/'.strtolower($name).'/list/',
					'taskType'     => 'read'
				);
		$data2 = Array
				(
					'idController' => $idController,
					'name'         => 'Inserir',
					'link'         => 'admin/'.strtolower($name).'/edit/',
					'taskType'     => 'write'
				);
		
		$this->tb->insert($data1);
		$this->tb->insert($data2);
	}
	
}


















