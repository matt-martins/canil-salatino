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
		$media    = $this->getContentBySection( 12, true, 5 );
		$puppies  = $cover->getShowPuppies() ? $this->getContentBySection( array(38,37,36), true, 5 ) : null;
		$hostel   = $cover->getShowHostel() ? $this->getContentBySection( 12, true, 3 ) : null;

		return array( 
			'cover'    => $cover,
			'carousel' => $carousel,
			'puppies'  => $puppies,
			'media'    => $media,
			'hostel'   => $hostel 
			);
	}
	
}
