<?php
class Zend_View_Helper_Gallery extends Zend_View_Helper_Abstract
{
	public function gallery($folder = null)
	{
		$matrix = $this->getMatrix($folder);
		
		if( $matrix ) 
		{
			$path  = __ROOT__ . 'public/uploads/' . $folder;
			$html  = '	<article id="gallery">'. "\n";
			$html .= '		<p class="legenda"></p>'. "\n";
			$html .= '		<span class="imgDestaque"><img width="600" src="'.__ROOT__.'public/site/images/sombra-carrossel.png"></span>'. "\n";
			$html .= '		<section class="galleryNavegContent">'. "\n";
			$html .= '			<ul>'. "\n";
			
			foreach ($matrix as $value)
			{
				
				$html .= '				<li><a href="'.$path.'/'.$value['file'].'" title="'.$value['legenda'].'"><img src="'.$path.'/temp/nadeb-temp-'.$value['file'].'"></a></li>'. "\n";
			}
			
			$html .= '			</ul>'. "\n";
			$html .= '		</section>'. "\n";
			$html .= '	</article>'. "\n";
			
			return $html;
		}
		
		return false;
	}
	
	private function getMatrix($folder)
	{
		$folder = "/public/uploads/" . $folder . "/";
		$files  = new Nadeb_Folder();
		$lista  = $files->listFiles( $folder );
		$file   = $_SERVER["DOCUMENT_ROOT"] . __ROOT__ . $folder . "info.inf";
		
		if(is_file( $file ))
		{
			return Zend_Json_Decoder::decode( Nadeb_Savefile::get($file) );
		}
		
		return false;
	}
}
	