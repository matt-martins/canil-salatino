<?php
class Site_Model_SendMail
{
	private $url;
	private $mailSender;
	private $nameSender;

	public function __construct()
	{
		$this->url = "http://" . $_SERVER['HTTP_HOST'] . __LINKS__;
		$this->nameSender = 'Canil Salatino';
		$this->mailSender = 'sendsite@canilsalatino.com.br';
	}

	public function contact($_dados)
	{
		$assunto = 'Site Salatino: ' . $_dados['subject'];
		$email   = $_SERVER["DOCUMENT_ROOT"] . __ROOT__ . "public/email/contact.html";

		$f    = fopen($email, "r");
		$body = fread($f, filesize($email));

		$body = str_replace("%%Assunto%%", $_dados['subject'],$body);
		$body = str_replace("%%Nome%%", $_dados['name'],$body);
		$body = str_replace("%%Email%%", $_dados['email'],$body);
		$body = str_replace("%%Estado%%", $_dados['state'],$body);
		$body = str_replace("%%Cidade%%", $_dados['city'],$body);
		$body = str_replace("%%Mensagem%%", $_dados['message'],$body);
// 		$body = str_replace("src=\"img/","src=\"{$this->url}public/email/img/",$body);

		$this->_send(Site_Model_Contact::getEmails($_dados['subject']),$this->mailSender,$body,$assunto);
// 		$this->_send('mateusweb@gmail.com',$this->mailSender,$body,$assunto);
	}

	public function teste($_dados)
	{
		$assunto = 'Site Salatino: ' . $_dados['subject'];
		$email   = $_SERVER["DOCUMENT_ROOT"] . __ROOT__ . "public/email/contact.html";

		$f    = fopen($email, "r");
		$body = fread($f, filesize($email));

		$body = str_replace("%%Nome%%", $_dados['name'],$body);
		$body = str_replace("%%Email%%", $_dados['email'],$body);
		$body = str_replace("%%Mensagem%%", $_dados['message'],$body);

		$email = 'mateusweb@gmail.com';
		$nome  = $this->mailSender;
		$body  = $body;
        
        $tr = new Zend_Mail_Transport_Smtp('secure68.hostgator.com.br', array(
            'auth' => 'login',
            'username' => 'sendsite@canilsalatino.com.br',
            'password' => '//**1234',
            'ssl' => 'ssl',
            'port' => 465)
        );

//		$tr = new Zend_Mail_Transport_Smtp('localhost', array('port' => 26));
		Zend_Mail::setDefaultTransport($tr);

		$mail = new Zend_Mail("UTF-8");
		$mail->setFrom("{$this->mailSender}", "$this->nameSender");
		$mail->addTo($email, $nome);
		$mail->setSubject($assunto);
		$mail->setBodyHtml($body);

		$mail->send();
	}

	private function _send($_email,$_nome,$_body,$_assunto)
	{
		$email = $_email;
		$nome  = $_nome;
		$body  = $_body;

		if( $_SERVER['HTTP_HOST'] == 'site-salatino' )
		{
			$tr = new Zend_Mail_Transport_Smtp('smtp.gmail.com', array(
				'auth' => 'login',
				'username' => 'nadebweb@gmail.com',
				'password' => '//**1234',
				'ssl' => 'ssl',
				'port' => 465)
			);
		}
		else
		{
//			$tr = new Zend_Mail_Transport_Smtp('localhost', array('port' => 26));
            $tr = new Zend_Mail_Transport_Smtp('secure68.hostgator.com.br', array(
                'auth' => 'login',
                'username' => 'sendsite@canilsalatino.com.br',
                'password' => '//**1234',
                'ssl' => 'ssl',
                'port' => 465)
            );
		}
		Zend_Mail::setDefaultTransport($tr);


		$mail = new Zend_Mail("UTF-8");
		$mail->setFrom("{$this->mailSender}", "$this->nameSender");
		$mail->addTo($email, $nome);
		$mail->setSubject($_assunto);
		$mail->setBodyHtml($body);

		$mail->send();
	}

}


















