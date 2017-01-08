<?php
namespace Salatino\CMSBundle\Core;

class DataModelFactory
{
	public static function get( $namespace, $model )
	{
		$array = explode( '-', $model );
        $dataModel = $namespace . '\\' . ucfirst( $array[0] ) . ( isset( $array[1] ) ? ucfirst( $array[1] ) : '' );
        
		return $dataModel;
	}
}