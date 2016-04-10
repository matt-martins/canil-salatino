<?php
class Site_Model_OtherDomains
{
	public function __construct()
	{
	}
	
	public function getContent( $domain )
	{
		$model  = new Application_Model_Db_OtherDomains();
		$select = $model->select()
					  ->where ( 'domainName = "'. $domain .'"' )
					  ->where ( 'active = 1' );
		
		$data = $model->fetchAll( $select );
		
		if( !isset( $data[0] ) )
		{
			$row = $model->fetchNew();
			$row->domainName = $domain;
			$row->banner = '';
			$row->title = 'Em Breve!';
			$row->body = '';
			$row->picture = '';
			$row->video = '';
			$row->showGallery = '';
			$row->showVideo = '';
			$row->folder = '';
			$row->insertDate = date('Y-m-d H-i-s');
			$row->save();
			
			$data = $model->fetchAll( $select );
		}
		
		$this->content = $data;

		$image = $this->content[0]->banner;
		$this->banner->image = $image ? $image : 'pix-banner.gif'; 
		$this->section->name = null;
		$this->subsection->name = null;
		
		return $this;
	}
	
}


