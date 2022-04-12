<?php
	
	class Email
	{
		function __construct()
		{
			//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'localhost';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = false;                                   //Enable SMTP authentication
			$mail->Username   = 'testes@dankicode.com';                     //SMTP username
			$mail->Password   = 'gui123456';                               //SMTP password
			$mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('testes@dankicode.com', 'Guilherme');
			$mail->addAddress('guilhermedantas.private@gmail.com', 'Guilher,e');     //Add a recipient

			//Attachments
    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
		}













	}

		
	// 	private $mailer;

	// 	public function __construct($host,$username,$senha,$name)
	// 	{
			
	// 		$this->mailer = new PHPMailer;

	// 		$this->mailer->isSMTP();                                      // Set mailer to use SMTP
	// 		$this->mailer->Host = $host;  				  // Specify main and backup SMTP servers
	// 		$this->mailer->SMTPAuth = true;                               // Enable SMTP authentication
	// 		$this->mailer->Username = $username;                 // SMTP username
	// 		$this->mailer->Password = $senha;                           // SMTP password
	// 		$this->mailer->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	// 		$this->mailer->Port = 465;                                    // TCP port to connect to

	// 		$this->mailer->setFrom($username,$name);
	// 		$this->mailer->isHTML(true);                                  // Set email format to HTML
	// 		$this->mailer->CharSet = 'UTF-8';

	// 	}

	// 	public function addAdress($email,$nome){
	// 		$this->mailer->addAddress($email,$nome);
	// 	}

	// 	public function formatarEmail($info){
	// 		$this->mailer->Subject = $info['assunto'];
	// 		$this->mailer->Body    = $info['corpo'];
	// 		$this->mailer->AltBody = strip_tags($info['corpo']);
	// 	}

	// 	public function enviarEmail(){
	// 		if($this->mailer->send()){
	// 			return true;
	// 		}else{
	// 			return false;
	// 		}
	// 	}

	// 
?>