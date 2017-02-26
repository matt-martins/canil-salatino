<?php
namespace Salatino\SiteBundle\Twig;

class InlineText extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('InlineText', array($this, 'InlineText')),
        );
    }

    public function InlineText( $string, $maxSize = 100 )
    {
        $link = $this->clear( $string, $maxSize );

        return $link;
    }

    public function getName()
    {
        return 'format_html';
    }

    private function clear($rawText, $maxSize)
    {
        $rawText = strip_tags($rawText);

        if(strlen($rawText) > $maxSize )
        {
            return trim ( substr($rawText, 0 , $maxSize - 3) ) . "...";
        }
        
        return $rawText;
    }
    
}