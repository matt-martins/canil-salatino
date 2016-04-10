<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }
    
    protected function _initRouter()
    {
    	$this->bootstrap('frontController');
    	$config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routes.ini', 'routes');
    	$router = $this->getResource('frontController')
					   ->getRouter()
					   ->addConfig($config, 'routes');
    
    	return $router;
    }
    
	protected function _initFrontController()
	{
		$front = Zend_Controller_Front::getInstance();
		$front->setControllerDirectory(array
		(
			'site'     => APPLICATION_PATH . '/modules/site/controllers/',
			'admin'    => APPLICATION_PATH . '/modules/admin/controllers/',
		));
		$front->addModuleDirectory( APPLICATION_PATH . '/modules' );
		$front->setParam('useDefaultControllerAlways', true);
		$front->setDefaultModule( 'site' );
		$front->setDefaultControllerName( 'index' );
		$front->setDefaultAction( 'index' );
		
		return $front;
	}
	
	protected function _initAutoloader()
	{
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->registerNamespace("Nadeb");
		unset($autoloader);
		
		new Zend_Application_Module_Autoloader(array(
			'namespace' => 'Site',
			'basePath'  => APPLICATION_PATH . '/modules/site',
		));
		new Zend_Application_Module_Autoloader(array(
			'namespace' => 'Admin',
			'basePath'  => APPLICATION_PATH . '/modules/admin',
		));
	}
}
	