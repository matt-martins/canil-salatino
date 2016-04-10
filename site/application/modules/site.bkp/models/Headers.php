<?php
class Site_Model_Headers
{
	public $title;
	public $keywords;
	public $description;
	
	
	public function __construct()
	{
		$this->title = 'Canil Salatino';
		$this->keywords = 'Clube Salatino, SPA para Yoga, Massagem e Meditação, Rottweilers, mascotes, Italian Greyhound, Papillon, Teckel pelo longo, Chinese Crested Dog, Saluki, Hotel & SPA, Fotos dos Hóspedes, Como cuidar do seu cão, Centro Veterinário, Clube Salatino, Salatino na Mídia, Gatil Salatino, Shows e Eventos';
		$this->description = 'A hospedagem de cães ou gatos implica em uma ampla responsabilidade por parte do Hotel para animais e isso fez com que nós, do Hotel e SPA para cães e gatos Salatino, estabelecêssemos um limite máximo de 40 hóspedes.';
	}
	
	public function getheaders($index)
	{
		$tb     = new Application_Model_Db_Headers();
		$select = $tb->select()->where ( 'active = 1' )->limit ( 1 );
		
		if( isset( $index['idContent'] )  && $index['idContent'] )
			  $select->where ( 'idContent = ' . $index['idContent'] );
		else
			  $select->where ( 'idContent = 0' );
		
		
		$data = $tb->fetchRow( $select );
		if( $data )
		{
			$this->title = $data->title;
			$this->keywords = $data->keywords;
			$this->description = $data->description;
		}
		
		return $this;
	}
	
}


