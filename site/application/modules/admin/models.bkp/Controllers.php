<?php
class Admin_Model_Controllers extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Controllers();
    	
    	parent::__construct();
	}
	
	public function get_all($_order = null)
	{
		$auth = Zend_Auth::getInstance();
		
		$where = ($auth->getStorage()->read()->groupName == 'Nadeb') ? null : 'idController IN('. $auth->getStorage()->read()->controllers .')';
		$fetchAll = $this->tb->fetchAll( $where, $_order )->toArray();
		
    	return $fetchAll;
	}
	
	public function get_links($type)
	{
		$data = false;
		$auth = Zend_Auth::getInstance();
		if( !$auth->hasIdentity() )
			return false;
		
		
		$where = ($auth->getStorage()->read()->groupName == 'Nadeb') ? 'display = "'.$type.'"' : 'idController IN('. $auth->getStorage()->read()->controllers .') AND display = "'.$type.'"';
		$fetchAll = $this->tb->fetchAll( $where, 'order ASC' )->toArray();
		
		foreach ($fetchAll as $key => $value)
		{
	    	$rs = $this->tb->find($value['idController'])->current();
	    	
			$select = $this->tb->select()->where('idController = ?', $value['idController'])->where('taskType = ?', 'read');
			( 
				( isset($auth->getStorage()->read()->permission[$value['idController']]) && $auth->getStorage()->read()->permission[$value['idController']] == '2' ) ||
				$auth->getStorage()->read()->groupName == 'Nadeb'
			) ? $select->orWhere('taskType = ?', 'write') : '';
			$select->order('order ASC')->order('name DESC');
			
			$dependent['dependent'] = $rs->findDependentRowset('Application_Model_Db_Actions', null, $select)->toArray();
			$data[] = array_merge( $rs->toArray(), $dependent );
		}
		
    	return $data;
	}
	
	public function get_controllers()
	{
		$i        = 0;
		$auth     = Zend_Auth::getInstance();
		$fetchAll = $this->tb->fetchAll()->toArray();
		
		$controllers = explode(',', $auth->getStorage()->read()->controllers);
		foreach ($fetchAll as $key => $value)
		{
			( in_array($value['idController'], $controllers) || $auth->getStorage()->read()->groupName == 'Nadeb' ) ? $data[$value['idController']] = $value['label'] : $data['x' . ++$i] = 0;
		}

		return $data;
	}
	
	public function check_controllPermission($controll, $controllers)
	{
		$auth = Zend_Auth::getInstance();
		$data = $this->tb->fetchAll( "name = '$controll'")->toArray();
		$controllers = explode(',', $controllers);
		foreach ( $controllers as $key => $value)
		{
			if( $value == $data[0]['idController']) 
			{
				if( $auth->getStorage()->read()->groupName != 'Nadeb' )
				{
					$permission = new Zend_Session_Namespace();
					$permission->permissionType = $data[0]['taskType'];
				}
				return true;
			}
		}
		
		return false;
	}
	
	public function data_grid()
	{
		$grid = new Nadeb_Data_Grid();
		$grid->totReg = count( $this->get_all() );
		$grid->tools['rel']      = __LINKS__ . 'admin/actions/';
		$grid->tools['move']     = __LINKS__ . 'admin/'. $this->_params->controller .'/save-order/';
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/';
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Label','Controller Name','Tipo de Ação','Exibir em');
		$grid->rows              = array('label' => 'tm150', 'name' => 'tm150', 'taskType' => 'tm150', 'display' => '-');
		
		return $grid->create_table( $this->get_all('order ASC') )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->set_data  ($this->get_one($id));
		$form->text      ('name','Controller');
		$form->text      ('label','Nome');
        $form->radio     ('display','Exibir em',$this->display_options());
        $form->checkbox  ('taskType','Ação',$this->taskType_options());
        $form->fieldset  ('buttons');
        $form->submit    ('btn_save','salvar');
        $form->button    ('btn_cancel','cancelar');
        
        if( $post )
        {
        	$result = $this->save($id, $post, $form);
        	if( $result['type'] == 'insert' )
        		$this->insertSampleActions( $result['primary'], $post['name'] );
        	
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
	
	private function display_options()
	{
		$array = Array(
			'menu'    => 'Menu',
			'sideBar' => 'Side Bar',
			''        => 'Oculto'
		);
		
		return $array;
	}
	
	private function insertSampleActions($idController, $name)
	{
		$sampleAction = new Admin_Model_Actions();
		$sampleAction->insertSampleActions($idController, $name);
	}
}


















