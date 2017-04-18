<?php
namespace Salatino\SiteBundle\Core;

use Salatino\EntityBundle\Entity\Content as Table;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Salatino\SiteBundle\Core\Component\CoreComponent;

class InstaFeed extends Content
{

	public function getFeed( $user, $limit = 5 )
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/' . $user . '/media/' );

        $result = curl_exec($ch);
        curl_close($ch);

        $obj    = json_decode($result);
        $count  = 0;
        $images = array();

        foreach ($obj->items as $feed)
        {
            if( $feed->type == 'image' )
            {
                if( $count == $limit ) break;
                $count++;

                $images[] = $feed->images->low_resolution->url;
            }
        }

        return $images;
    }
	
}
