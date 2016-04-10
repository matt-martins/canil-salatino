<?php
class Admin_Model_Content extends Nadeb_Model_Crud
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Content();
    	
    	parent::__construct();
	}
	
	public function data_grid($params = null)
	{
		$grid = new Nadeb_Data_Grid();
		$grid->title('Listagem de conteúdos do site');
		$grid->totReg = count( $this->get_all($params) );
		$grid->tools['move']     = __LINKS__ . 'admin/'. $this->_params->controller .'/save-order/';
		$grid->tools['editar']   = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( $this->_params->rel ? 'rel/' .  $this->_params->rel : '' );
		$grid->tools['excluir']  = __LINKS__ . 'admin/'. $this->_params->controller .'/delete/';
		$grid->primary           = $this->primary;
		$grid->columns           = array('Titulo','Exibir');
		$grid->rows              = array(
										'title'   => 'tm250',
										'active'  => array('tm30',  'swap', __LINKS__ . 'admin/' . $this->_params->controller)
									);
		
		return $grid->create_table( $this->get_all( $params, 'order ASC' ) )->get();
	}
	
	public function data_form($id = null, $post)
	{
		$data = $this->get_one($id);
		$header      = Nadeb_HeaderController::get_instance();
		$header->js  = "public/admin/js/content.js";
		
		$form = new Nadeb_Data_Form($this->_params->controller);
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/edit/' . ( ($id) ? 'id/' . $id : '' );
		$form->title     ('Cadastro de conteúdo');
		$form->set_data  ($data);
		$form->select    ('idSection','Menu',Admin_Model_Sections::getAllSections());
		$form->select    ('idSubsection','Sub menu',$this->subsectionOptions( $data['idSubsection'] ));
		$form->select    ('template','Template',$this->templatesOptions());
		$form->text      ('title','Titulo');
		$form->jseditor  ('body','Conteúdo');
		$form->file      ('smallPicture','Imagem Pequena (300 x 200)');
		$form->file      ('picture','Imagem (600 de largura)');
		$form->text      ('video','Video do youtube');
		$form->radio     ('showGallery','Exibir nas galerias de fotos?',$this->typeOptions(), 1);
		$form->radio     ('showVideo','Exibir nas galerias de videos',$this->typeOptions(), 1);
		$form->checkbox  ('tags','Categorias',Admin_Model_Tags::getTagsOptions());
		$form->hidden    ('insertDate',date('Y-m-d H:i:s'));
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
	
	public function subsectionOptions($id)
	{
		if( $id )
			$result = array($id => '');
		else
			$result = array('-1' => '');
		
		return $result;
	}
	
	public function typeOptions()
	{
		return array('1' => 'Sim', '0' => 'Não');
	}
	
	public function templatesOptions()
	{
		$templates = array(
			'imagem-texto' => 'Imagem e Texto',
			'video-texto'  => 'Video e Texto',
			'pedigree'     => 'Pedigree',
			'racas'        => 'Raças'
		);
		
		return $templates;
	}
	
	public function get_all($params = null, $order = null)
	{
		$select = $this->tb->select();
		$select->limit( 100 );
		
		if( isset($params['title']) )      $select->where('title LIKE ?', "%{$params['title']}%");
		if( isset($params['idSection']) )  $select->where('idSection = ?', "{$params['idSection']}");
		if( isset($params['template']) )   $select->where('template = ?', "{$params['template']}");
		if( $order )                       $select->order($order);
		
		return $this->fetch_data($select);
	}
	
	public static function getAllContents()
	{
		$hd = new Admin_Model_Header();
		$shd = $hd->serializeHeaders();
		
		$tb = new Application_Model_Db_Content();
		$select = $tb->select()->where('active = 1')->where('idContent NOT IN('.$shd.')');//->order('order ASC');
		$data = $tb->fetchAll( $select );
		
		$result[-1] = 'Selecione uma noticia';
		
		if( $shd != 0 && strpos($shd, '0,') !== 0 ) $result[0] = 'Titulo Padrão';
		foreach ( $data as $value )
		{
			$result[$value['idContent']] = $value['title'];
		}
		
		return $result;
	}
	
	private function fetch_data($select)
	{
		$fetchAll = $this->tb->fetchAll( $select )->toArray();
		
		return isset($fetchAll) ? $fetchAll : null;
	}
	
	public function search_form()
	{
		$form = new Nadeb_Data_Form('search-form');
		$form->form_action = __LINKS__ . 'admin/'. $this->_params->controller .'/list/search/true/';
		$form->set_data     (null);
		$form->selectsearch ('idSection','Sessão', Admin_Model_Sections::getAllSections());
		$form->textsearch   ('title','Titulo');
		
		return $form->create_form()->get();
	}
	

}


