<?php
class Admin_Model_Sample extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Sample();
    	
    	parent::__construct();
	}
	
	public function data_grid()
	{
		$grid = new Nadeb_Data_Grid();
		$grid->title('Listagem de Sample');
		$grid->totReg = count( $this->get_all() );
		$grid->tools['move']     = __LINKS__ . 'admin/'. $this->_params->controller .'/save-order/';
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/';
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Titulo','Tipo','Imagem','Data');
		$grid->rows              = array('title' => 'tm150','type' => 'tm50','picture' => 'tm50','date' => '-');
		
		return $grid->create_table( $this->get_all() )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->title     ('Cadastro de Sample');
		$form->set_data  ($this->get_one($id));
        $form->select    ('type','type',$this->typeOptions());
		$form->text      ('title','Titulo');
        $form->textarea  ('body','Conteúdo');
        $form->jseditor  ('htmlBody','Conteúdo');
        $form->file      ('picture','Imagem');
        $form->text      ('date','Data');
        $form->radio     ('options1','options 1',$this->typeOptions());
        $form->checkbox  ('options2','options 2',$this->typeOptions());
        $form->jsfolder  ('folder', 'Galeria de imagens');
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
	
	public function search_form()
	{
		$form = new Nadeb_Data_Form('search-form');
		$form->form_action = __LINKS__ . 'admin/inscriptions/list/search/true/';
		$form->set_data     (null);
		$form->datesearch   ('insertDate','Data');
		$form->selectsearch ('state','Estado', null);
		$form->textsearch   ('hairStudioName','Nome do salão');
        return $form->create_form()->get();
	}
	
	public function typeOptions()
	{
		return array('01' => 'Tipo 1', '02' => 'Tipo 2', '03' => 'Tipo 3', '04' => 'Tipo 4');
	}
	
}


