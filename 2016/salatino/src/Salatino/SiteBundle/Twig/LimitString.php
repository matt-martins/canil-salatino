<?php
namespace Salatino\SiteBundle\Twig;

class LimitString extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('LimitString', array($this, 'LimitString')),
        );
    }

    public function LimitString( $value, $limit )
    {
    	if(strlen($value) > $limit ){
    		return trim ( substr($value, 0 , $limit - 3) ) . "...";
    	}
    	return $value;
    }

    public function getName()
    {
        return 'limitstring_extension';
    }
}
