<?php
class Admin_Model_Header extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Headers();
    	
    	parent::__construct();
	}
	
	public function data_grid()
	{
		$grid = new Nadeb_Data_Grid();
		$grid->title('Listagem de tags para SEO');
		$grid->totReg = count( $this->get_all() );
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/';
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Titulo','Descrição','palavras-chave', 'Ativo');
		$grid->rows              = array(
									'title'       => '-',
									'description' => '-',
									'keywords'    => '-',
									'active'      => array('tm30',  'swap', __LINKS__ . 'admin/' . $this->_params->controller)
									);
		
		return $grid->create_table( $this->get_all('idContent ASC') )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$header      = Nadeb_HeaderController::get_instance();
		$header->js  = "public/admin/js/headers.js";
		
		$form = new Nadeb_Data_Form();
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->title     ('Cadastro de tags para SEO');
		$form->set_data  ($this->get_one($id));
		$form->select    ('idContent', 'Noticia', Admin_Model_Content::getAllContents(), '-1');
		$form->fieldset  ('dados');
		$form->text      ('title', 'Titulo');
		$form->textarea  ('description', 'Descrição');
		$form->textarea  ('keywords', 'palavras-chave');
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
	
	public function serializeHeaders()
	{
		$idHeaders = '';
		$header = new Application_Model_Db_Headers();
		$sql = $header->select()->order('idContent ASC');
		$rs = $header->fetchAll( $sql );
		foreach ( $rs as $obj )
		{
			$idHeaders[] = $obj->idContent;
		}
		$idHeaders = $idHeaders ? implode( ',', $idHeaders ) : '-1';
		
		return $idHeaders;
	}
	
}


