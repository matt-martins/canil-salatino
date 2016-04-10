<?php
class Zend_View_Helper_Breadcrumb extends Zend_View_Helper_Abstract
{
	public function breadcrumb($obj, $list = false)
	{
		$url   = __LINKS__; 
		$html  = '<nav class="breadCrumb">'. "\n";
		$html .= '	<ul>'. "\n";
		$html .= '		<li><a href="'.$url.'">home</a></li>'. "\n";
		if( isset($obj->section->name))
		{
			$url  .= Nadeb_ClearLinks::clear( $obj->section->name ). '/'; 
			$html .= '		<li><a href="'.$url.'">&nbsp;&gt;&nbsp;'.$obj->section->name.'</a></li>'. "\n";
		}
		if( isset($obj->subsection->name) ) 
		{
			$url  .= Nadeb_ClearLinks::clear( $obj->subsection->name ) . '/'; 
			$html .= '		<li><a href="'.$url.'">&nbsp;&gt;&nbsp;'.$obj->subsection->name.'</a></li>'. "\n";
		}
		if( isset($obj->content[0]->title) && !$list  && $obj->section->name != $obj->content[0]->title ) 
		{
			$html .= '		<li><strong>&nbsp;&gt;&nbsp;'.$obj->content[0]->title.'</strong></li>'. "\n";
		}
		$html .= '	</ul>'. "\n";
		$html .= '</nav>'. "\n";
		
		
		return $html;

	}
	
}
	