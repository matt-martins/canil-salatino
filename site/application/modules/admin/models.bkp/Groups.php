<?php
class Admin_Model_Groups extends Nadeb_Model_Crud
{
	private $storage;
	
	public function __construct()
	{
		$auth = Zend_Auth::getInstance();
		$this->storage = $auth->getStorage()->read();
		
    	$this->tb = new Application_Model_Db_Groups();
    	
    	parent::__construct();
	}
	
	public function get_groups()
	{
		$where = $this->storage->groupName != "Nadeb" ? 'name <> "Nadeb"' : null;
		$fetchAll = $this->tb->fetchAll( $where )->toArray();
		foreach ($fetchAll as $key => $value)
		{
			$data[$value['idGroup']] = $value['name'];
		}
		
		return $data;
	}
	
	public function get_all()
	{
		$where = $this->storage->groupName != "Nadeb" ? 'name <> "Nadeb"' : null;
		
		$data = $this->tb->fetchAll( $where )->toArray();
		
    	return $data;
	}
	
	
	
	public function get_one($id)
	{
		$data = $this->tb->find($id)->toArray();
		
		if( isset($data[0]) )
		{
			
			if($data[0]['name'] == "Nadeb" && $this->storage->groupName != "Nadeb")
				return false;
				
	    	return $data[0];
		}
	    else
	    {
	    	return false;
	    }
	}
	
	public function data_grid()
	{
		$grid = new Nadeb_Data_Grid();
		$grid->totReg = count( $this->get_all() );
		$grid->tools['move']     = __LINKS__ . 'admin/'. $this->_params->controller .'/save-order/';
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/';
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Nome');
		$grid->rows              = array('name' => '-');
		
		return $grid->create_table( $this->get_all() )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$js             = Nadeb_JScontroller::get_instance();
		$js->JSInstance = "admin_PermissionControll";
		
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->set_data  ($this->get_one($id));
		$form->text      ('name','Nome');
        $form->hidden    ('permission');
        $form->checkbox  ('controllers','Controles',$this->controllers());
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
	
	private function controllers()
	{
		$controllers = new Admin_Model_Controllers();
		$array = $controllers->get_controllers();
		
		return $array;
	}
}


















