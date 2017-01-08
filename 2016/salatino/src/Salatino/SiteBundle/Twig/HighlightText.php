<?php
namespace Salatino\SiteBundle\Twig;

class HighlightText extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('highlightText', array($this, 'highlightText')),
        );
    }

    public function highlightText( $str, $keyword )
    {
        $keyword = explode( ' ', $keyword );

        foreach( $keyword as $k => $v )
            $str = preg_replace( "/($v)/i" , "<span class=\"green\">$0</span>" , $str );
        
        return $str;
    }

    public function getName()
    {
        return 'highlight_text';
    }
}