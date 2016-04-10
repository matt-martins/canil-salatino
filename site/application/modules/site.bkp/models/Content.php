<?php
class Site_Model_Content
{
	public function getContent($section)
	{
		$tb = new Application_Model_Db_Content();
		$select = $tb->select()
					 ->where ( 'active = 1' )
					 ->order ( 'order ASC' );
		
		if( $section['idContent'] != '' )
		{
			$select->where('idContent = ' . $section['idContent']);
		}
		
		if( $section['key'] == $section['section'] && isset($section['value']) && $section['value'] != 'videos' &&  $section['value'] != 'galerias-de-fotos' )
		{
			$select->where('idSubsection = -1');
			
			$modelSection = new Application_Model_Db_Sections();
			$modelSubsection = new Application_Model_Db_Subsections();
			$this->subsection = null;
			$this->section = $modelSection->fetchRow('idSection = '.$section['section']);
			$this->content = $this->section->findDependentRowset('Application_Model_Db_Content', null, $select);
			
		}
		
		if( $section['value'] == 'videos' )
		{
			$select->where('showVideo = 1');
			
			$modelSection = new Application_Model_Db_Sections();
			$modelSubsection = new Application_Model_Db_Subsections();
			$this->subsection = null;
			$this->section = $modelSection->fetchRow('idSection = '.$section['section']);
			$this->content = $tb->fetchAll($select);
			
		}
		
		if( $section['value'] == 'galerias-de-fotos' )
		{
			$select->where('showGallery = 1');
			
			$modelSection = new Application_Model_Db_Sections();
			$modelSubsection = new Application_Model_Db_Subsections();
			$this->subsection = null;
			$this->section = $modelSection->fetchRow('idSection = '.$section['section']);
			$this->content = $tb->fetchAll($select);
			
		}
		
		if( $section['key'] != $section['section'] )
		{
			$modelSection = new Application_Model_Db_Sections();
			$modelSubsection = new Application_Model_Db_Subsections();
			$this->subsection = $modelSubsection->fetchRow('idSubsection = '.$section['key']);
			$this->section = $modelSection->fetchRow('idSection = '.$section['section']);
			$this->content = $this->subsection->findDependentRowset('Application_Model_Db_Content', null, $select );
			
			if( isset($this->content[0]->template) && $this->content[0]->template == 'pedigree' )
			{
				$pedigree = new Application_Model_Db_Pedigree();
				$this->pedigree = $pedigree->fetchRow('idContent = '. $this->content[0]->idContent);
			}
		}

		return $this;
	}
	
	public function getHomeHighlights()
	{
		$section = new Application_Model_Db_Sections();
		$subSection = new Application_Model_Db_Subsections();
		$tb = new Application_Model_Db_Content();
		
		$this->noticias = $this->getQueryTextObj($tb, $section, $subSection, 'tags LIKE "%noticia%"');
		$this->midia = $this->getQueryTextObj($tb, $section, $subSection, 'tags LIKE "%midia%"');
		$this->clube = $this->getQueryTextObj($tb, $section, $subSection, 'tags LIKE "%clube-salatino%"');
		$this->fotos = $this->getQueryImageObj($tb, 'showGallery = 1' );
		
		foreach ( $this->fotos as $value ) 
		{
			$link = 'galerias-de-fotos/' . $value->idContent . '/' . Nadeb_ClearLinks::clear( $value->title );
			
			$value->idSection = $link;
		}
		
		return $this;
	}
	
	public function getQueryTextObj($tb, $section, $subSection, $where)
	{
		$result = $tb->fetchAll( $this->getQuery($tb, $where) );
		foreach ( $result as $value )
		{
			$name  = $subSection->find( $value->idSubsection );
			$link  = Nadeb_ClearLinks::clear( $section->find( $value->idSection )->getRow(0)->name );
			$link .= ( $value->idSubsection == -1 || !isset( $name[0] ) ) ? '' : '/' . Nadeb_ClearLinks::clear( $name->getRow(0)->name );
			$link .= '/' . $value->idContent . '/' . Nadeb_ClearLinks::clear( $value->title );
				
			$value->idSection = $link;
		}
		
		return $result;
	}
	
	private function getQueryImageObj($tb, $where)
	{
		$result = $tb->fetchAll( $this->getQuery($tb, $where) );
		foreach ( $result as $value ) 
		{
			$link = 'galerias-de-fotos/' . $value->idContent . '/' . Nadeb_ClearLinks::clear( $value->title );
			
			$value->idSection = $link;
		}
		
		return $result;
	}
	
	private function getQuery($tb, $where, $limit = 3)
	{
		return $tb->select()->where ( 'active = 1' )->order ( new Zend_Db_Expr('RAND()') )->limit ( $limit )->where($where);
	}
	
}


