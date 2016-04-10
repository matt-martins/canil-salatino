<?php
class Site_Model_Banners
{
	public function __construct()
	{
	}
	
	public static function getbanner()
	{
		$ban    = new Application_Model_Db_Banners();
		$select = $ban->select()
					  ->where ( 'active = 1' )
					  ->order ( new Zend_Db_Expr('RAND()') )
					  ->limit ( 1 );
		
		$data = $ban->fetchRow( $select );
		
		return $data;
	}
	
}


