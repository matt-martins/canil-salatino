<?php
class Zend_View_Helper_Linkslist extends Zend_View_Helper_Abstract
{
	public function linkslist($obj, $value)
	{
		$link  = __LINKS__;
		$link .= Nadeb_ClearLinks::clear($obj->section->name) . '/';
		if( isset($obj->subsection->name) ) 
			$link .= Nadeb_ClearLinks::clear($obj->subsection->name) . '/';
		$link .= Nadeb_ClearLinks::clear($value->idContent) . '/';
		$link .= Nadeb_ClearLinks::clear($value->title);
		
		return $link;

	}
	
}
	