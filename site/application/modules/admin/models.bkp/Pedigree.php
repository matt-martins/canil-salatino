<?php
class Admin_Model_Pedigree extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Pedigree();
    	
    	parent::__construct();
	}
	
	public function data_grid()
	{
		$header      = Nadeb_HeaderController::get_instance();
		$header->css = "public/admin/css/pedigree.css";
		
		$content = new Admin_Model_Content();
		$data = $content->get_all(array('template' => 'pedigree'), 'order ASC');
		
		$grid = new Nadeb_Data_Grid();
		$grid->title('Listagem de Pedigree');
		$grid->totReg = count( $data );
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/';
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Titulo', 'Imagem');
		$grid->rows              = array(
									'title'   => 'tm250',
									'smallPicture'   => array('-', 'link', 'public/uploads/')
									);
		
		return $grid->create_table( $data )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$header      = Nadeb_HeaderController::get_instance();
		$header->css = "public/admin/css/pedigree.css";
		
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->title     ('Cadastro de Pedigree');
		$form->set_data  ($this->get_one($id));
		$form->hidden    ('idContent', $id);
		$form->text      ('cp01','Pai');
		$form->text      ('cp02','Avós');
		$form->text      ('cp03','-');
		$form->text      ('cp04','Bisavós');
		$form->text      ('cp05','-');
		$form->text      ('cp06','-');
		$form->text      ('cp07','-');
		$form->text      ('cp08','Mãe');
		$form->text      ('cp09','Avós');
		$form->text      ('cp10','-');
		$form->text      ('cp11','Bisavós');
		$form->text      ('cp12','-');
		$form->text      ('cp13','-');
		$form->text      ('cp14','-');
        $form->fieldset  ('buttons');
        $form->submit    ('btn_save','salvar');
        $form->button    ('btn_cancel','cancelar');
        
		if( $post )
        {
        	$id = $this->tb->find($id)->toArray() ? $id : null;
        	
        	$result = $this->save($id, $post, $form);
        	return $result['message'];
        }
        else
        {
        	return $form->create_form()->get();
        }
	}
	
}


