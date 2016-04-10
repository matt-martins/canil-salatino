<?php
class Admin_Model_Indexes
{
	public function saveIndexes()
	{
		$tb = new Application_Model_Db_Indexes();
		$del = $tb->delete(null);
		$menu = Site_Model_Sections::getMenu();
		
		foreach( $menu as $value)
		{
			$row = $tb->fetchNew();
			
			$row->key   = $value['idSection'];
			$row->value = Nadeb_ClearLinks::clear($value['name']);
			$row->categ = 1;
			$row->save();
			if( isset($value['sub']) )
			{
				foreach( $value['sub'] as $subValue)
				{
					$row = $tb->fetchNew();
						
					$row->key   = $subValue['idSubsection'];
					$row->value = Nadeb_ClearLinks::clear($value['name']) . '/' . Nadeb_ClearLinks::clear($subValue['name']);
					$row->categ = 2;
					$row->save();
				}
			}
		}
	}
	
	public function getID($param)
	{
		$tb  = new Application_Model_Db_Indexes();
		$url = $param['section'] . ( $param['subSection'] && !is_numeric( $param['subSection'] ) ? '/' . $param['subSection'] : '' );
		
		$result['section']   = null;
		
		$select = $tb->select()->where( $tb->getAdapter()->quoteInto('value = ?', $url) );
		$data = $tb->fetchRow( $select );
		
		if( $data )
		{
			$result = $data->toArray();
		}
		
		$select = $tb->select()->where( $tb->getAdapter()->quoteInto('value = ?', $param['section']) );
		$data = $tb->fetchRow( $select );
		
		if( $data )
		{
			$param['section'] = $data->toArray();
			$result['section'] = $param['section']['key'];
		}
		$result['idContent'] = ( is_numeric( $param['subSection'] ) ? $param['subSection'] : ( $param['idContent'] ? $param['idContent'] : '' ) );
		$result['title']   = ( $param['title'] ? $param['title'] : ( is_numeric( $param['subSection'] ) ?  $param['idContent'] : '' ) );
		
// 		Nadeb_Debug::x( $result );
		return $result;
	}
}


