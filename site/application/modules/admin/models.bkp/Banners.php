<?php
class Admin_Model_Banners extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Banners();
    	
    	parent::__construct();
	}
	
	public function data_grid()
	{
		$grid = new Nadeb_Data_Grid();
		$grid->title('Listagem de Banners');
		$grid->totReg = count( $this->get_all() );
		$grid->tools['move']     = __LINKS__ . 'admin/'. $this->_params->controller .'/save-order/';
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/';
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Imagem', 'Exibir');
		$grid->rows              = array(
									'image'   => array('-', 'link', 'public/uploads/'),
									'active'  => array('tm30',  'swap', __LINKS__ . 'admin/' . $this->_params->controller)
									);
		
		return $grid->create_table( $this->get_all() )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->title     ('Cadastro de Banners');
		$form->set_data  ($this->get_one($id));
		$form->file      ('image','Imagem (1000 x 180)');
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


