<?php
class IndexController extends Nadeb_Controller_Front
{
	
	public function init()
	{
		parent::init();
		
		$hd = new Site_Model_Headers();
		$this->view->headers = $hd->getheaders( $this->view->index );
		
		if( !strpos( $_SERVER['SERVER_NAME'], 'salatino'  ) )
		{
			$matrix = array( 'http://', 'www.' );
			$domain = str_replace( $matrix, '', $_SERVER['SERVER_NAME']);
			
			$content = new Site_Model_OtherDomains();
			$this->view->obj = $content->getContent( $domain );
			$this->view->banner = $this->view->obj->banner;
			
			$this->renderScript("templates/imagem-texto.phtml");
		}
		else
		{
			$id = new Admin_Model_Indexes();
			$this->view->index = $id->getID( $this->_getAllParams() );
			$this->view->banner = Site_Model_Banners::getbanner();
			
			if( $this->view->index['section'] )
			{
				$content = new Site_Model_Content();
				$this->view->obj = $content->getContent( $this->view->index );
				
				$template = count($this->view->obj->content) > 1 ? 'lista' : $this->view->obj->content[0]->template;
				
				$this->renderScript("templates/{$template}.phtml");
			}
			else
			{
				$content = new Site_Model_Content();
				$this->view->obj = $content->getHomeHighlights();
			}
		}
	}

	public function indexAction()
	{
	}
	
}

