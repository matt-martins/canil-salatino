<?php
class Zend_View_Helper_Related extends Zend_View_Helper_Abstract
{
	
	public function related($tag = null, $title)
	{
		if( $tag ) 
		{
			$section = new Application_Model_Db_Sections();
			$subSection = new Application_Model_Db_Subsections();
			$tb = new Application_Model_Db_Content();
			$content = new Site_Model_Content();
			
			$rel = $content->getQueryTextObj($tb, $section, $subSection, 'tags LIKE "%'.$tag.'%"');
		
			$html  = '<article class="article">'. "\n";
			$html .= '	<h2>'.$title.'</h2>'. "\n";
			$html .= '	<section class=gallery>'. "\n";
			$html .= '		<article class="notice">'. "\n";
			foreach ( $rel as $value )
			{
				$link = __LINKS__ . $value->idSection;
				$file = is_file($_SERVER['DOCUMENT_ROOT'].__ROOT__.'public/uploads/'. $value->smallPicture) ? __ROOT__.'public/uploads/'. $value->smallPicture : __ROOT__.'public/site/images/nao-disponivel.jpg';
				$html .= '			<a href="'.$link.'"><img src="'.$file.'" width="229" height="153" ></a>'. "\n";
			}
			$html .= '		</article>'. "\n";
			$html .= '	</section>'. "\n";
			$html .= '</article>'. "\n";
			
			return $html;
		}
		
		return false;
	}
	
}
	