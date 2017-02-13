<?php
namespace Salatino\SiteBundle\Core;

use Salatino\EntityBundle\Entity\Content as Table;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Salatino\SiteBundle\Core\Component\CoreComponent;

class Home extends Content
{

	public function getHomeContent()
	{
		$cover    = $this->getOneContentById( 266 );
		$carousel = $this->getCarousel( 'carousel-home' );
		
		return array( 
			'cover'    => $cover,
			'carousel' => $carousel 
			);
	}
	
}
