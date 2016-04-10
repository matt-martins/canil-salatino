<?php
class Site_Model_Sections
{
	public function __construct()
	{
    	$this->tb = new Application_Model_Db_Sections();
	}
	
	public static function getMenu()
	{
		$sect   = new Application_Model_Db_Sections();
		$db     = $sect->getAdapter();
		$select = $db->select()
					->from  ( array('a' => 'sections') )
					->where ( $db->quoteInto('a.active = ?', 1) )
					->order ( 'a.order ASC' );
		$sec = $db->fetchAll( $select );

		$subs   = new Application_Model_Db_Subsections();
		$db     = $subs->getAdapter();
		$select = $db->select()
					 ->from  ( array('a' => 'subsections') )
					 ->where ( $db->quoteInto('a.active = ?', 1) )
					 ->order ( 'a.order ASC' );
		
		$sub = $db->fetchAll( $select );
		
		foreach ($sec as $key => $value)
		{
			$data[$value['idSection']] = $value;
		}
		foreach ($sub as $key => $value)
		{
			$data[$value['idSection']]['sub'][$value['idSubsection']] = $value;
		}
		
		return $data;
	}
	
}


