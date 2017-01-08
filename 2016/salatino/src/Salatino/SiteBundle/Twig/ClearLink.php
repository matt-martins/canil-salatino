<?php
namespace Salatino\SiteBundle\Twig;

class ClearLink extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('clearLink', array($this, 'clearLink')),
        );
    }

    public function clearLink( $string )
    {
        $link = $this->clear( $string );

        return $link;
    }

    public function getName()
    {
        return 'clear_link';
    }

    private function clear($link)
    {
        $link = $this->normaliza($link);
        $link = preg_replace('/\(/', '', $link);
        $link = preg_replace('/\)/', '', $link);
        $link = preg_replace('/ /', '-', trim($link));
        $link = preg_replace('/[^a-z0-9-]/','', $link);
        $link = preg_replace('/--+/','-', $link);
        $link = preg_replace('/-$/','', $link);
        
        return $link;
    }
    
    private function normaliza($string)
    {
        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ“”"\'';
        $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr    ';
        
        $string = utf8_decode($string);    
        $string = strtr($string, utf8_decode($a), $b);
        $string = strtolower($string);
        
        return utf8_encode($string);
    }
}