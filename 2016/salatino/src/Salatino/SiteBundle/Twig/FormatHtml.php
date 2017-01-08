<?php
namespace Salatino\SiteBundle\Twig;

class FormatHtml extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('formatHtml', array($this, 'formatHtml')),
        );
    }

    public function formatHtml( $string )
    {
        $link = $this->clear( $string );

        return $link;
    }

    public function getName()
    {
        return 'format_html';
    }

    private function clear($rawText)
    {
        // $link = preg_replace('/[^a-z0-9-]/','', $link);
        $rawText = strip_tags($rawText, '<ul><li><strong><br/><br /><br><a>');
        $rawText = preg_replace('/(<br>)+$/', '', $rawText);
        $rawText = preg_replace('/(<br\/>)+$/', '', $rawText);
        $rawText = preg_replace('/(<br \/>)+$/', '', $rawText);

        // $rawText = str_replace('<br />', "\n", $rawText);
        // $rawText = str_replace('<br>', "\n", $rawText);
        // $rawText = str_replace('<br/>', "\n", $rawText);
        
        return $rawText;
    }
    
}