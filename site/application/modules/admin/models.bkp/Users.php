<?php
class Admin_Model_Users extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Users();
    	
    	parent::__construct();
	}
	
	public function get_all()
	{
		$auth = Zend_Auth::getInstance();
		$storage = $auth->getStorage()->read();
		
		$db = $this->tb->getAdapter();
		$select = $db->select()
					 ->from( array('a' => $this->info['name']) )
					 ->join( array('b' => 'groups'), 'a.idGroup = b.idGroup', Array('nameGroup' => 'name') )
		;
		if($storage->groupName != "Nadeb")
			$select->where('b.name <> "Nadeb"');
		
		$data = $db->fetchAll( $select );
		
    	return $data;
	}
	
	public function data_grid()
	{
		$grid = new Nadeb_Data_Grid();
		$grid->totReg = count( $this->get_all() );
		$grid->tools['move']     = __LINKS__ . 'admin/'. $this->_params->controller .'/save-order/';
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/';
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Titulo','Descição');
		$grid->rows              = array('name' => 'tm150','email' => '-');
		
		return $grid->create_table( $this->get_all() )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->set_data  ($this->get_one($id));
        $form->select    ('idGroup','Grupo',$this->groups());
		$form->text      ('name','Nome');
        $form->text      ('email','Email');
        $form->aesPsw    ('password','Senha');
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
	
	private function groups()
	{
		$controllers = new Admin_Model_Groups();
		$array = $controllers->get_groups();
		
		//Nadeb_Debug::x( $array );		
		return $array;
	}
	
}


















