<?php 
/*
	Classe de controle de envio de todos os email que disparados pelo sistema;
*/



class Email {
	
	private $mail;

	public static function sendEmail($subject,$body,$sendTo){
			
			//php mailer class
			Yii::import('application.extensions.phpmailer.JPhpMailer');

			// Inicia a classe PHPMailer
	 		$mail = new JPhpMailer; 
			
			/*
				Define os dados do servidor e tipo de conexão
			*/
			$mail->IsSMTP(); // Define que a mensagem será SMTP
			$mail->Host = 'mail.interativstore.com.br';  // Endereço do servidor SMTP
			$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
			$mail->Username = 'contato@interativstore.com.br';  // Usuário do servidor SMTP
			$mail->Port = '587'; 
			$mail->Password = 'web10099'; // Senha do servidor SMTP
			$mail->CharSet = 'utf-8';  
			
			/*
				Define o remetente
			*/
			$mail->SetFrom('no-replay@passaficha.com.br', 'Passa Ficha'); 
			
			/*
				Define a mensagem (Texto e Assunto)
			*/
			$mail->Subject = $subject; 
			$mail->MsgHTML($body);// Define que o e-mail será enviado como HTML
			$mail->AltBody = 'Confirme sua conta para acessar o site do Passa Ficha.';

			/*
				Define os destinatário(s)
			*/
			$mail->AddAddress('marcoaurelio_a@hotmail.com', 'Passa Ficha'); 
			//$mail->AddAddress($sendTo);
			
			/*
				Define os anexos (opcional)
			*/
			/*if(!empty($this->anexo)){
				$mail->AddAttachment("".$this->anexo."");  // Insere um anexo
			}*/

			// Envia o e-mail
			$enviado = $mail->Send();

			// Limpa os destinatários e os anexos
			$mail->ClearAllRecipients();
			$mail->ClearAttachments();

			if (!$enviado) {
				echo "Não foi possível enviar o e-mail.<br /><br />";
				echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
			}
	 	
	}


	public static function ConfirmacaoPreCadastro($sendTo,$tokenDeConfirmacao){
		$subject = 'Confirmação de cadastro.';
		$body='
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Passa Ficha</title>
			</head>

			<body>
			<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="font:16px normal Arial, Helvetica, sans-serif; color:#697882;background: none repeat scroll 0 0 #E9ECF3;border-collapse:collapse;min-width:700px;table-layout: fixed;">
			  <tr>
			    <td>
			    <div style="background-color:#ffffff;border-radius:4px;width:700px;margin:20px auto;">
			      <table width="700" border="0" align="center" cellpadding="20" cellspacing="0">
			        <tr>
			          <td><a href="http://passaficha.com.br/" title="Passa Ficha"><img src="http://dev.revendamais.com.br/passa-ficha/assets/img/logo-light.png" title="Passa Ficha" /></a></td>
			        </tr>
			      </table>
			   	</div>
			   </td>
			  </tr>
			  <tr bgcolor="#E9ECF3">
			    <td>
			    	<div style="background-color:#ffffff;border-radius:4px 4px 0 0;width:700px;margin:auto;height:4px">
			      </div>
			      <table width="700" border="0" align="center" cellpadding="20" cellspacing="0">
			        <tr bgcolor="#ffffff">
			          <td>
			            <p>Estamos quase lá!</p>
			            <p style="line-height:24px;">
			            	Clique no link abaixo ou copie e cole o endereço  em seu navegador para confirmar a sua conta.
			            	<br>
			            	<strong>Login</strong>: '.$sendTo.'
			            </p>
			            <p><a  style="color:#5b9bd1; text-decoration:none;" href="http://'.$_SERVER['SERVER_NAME'].'/passaficha/site/index.php'.'/active-token?t='.$tokenDeConfirmacao.'">http://'.$_SERVER['SERVER_NAME'].'/passaficha/site/index.php'.'/active-token?t='.$tokenDeConfirmacao.'</a></p>
			            <p><small>Se você não se cadastrou no site Passa Ficha, por favor, desconsidere essa mensagem.</small></p>
								</td>
			        </tr>
			      </table>
			      	<div style="background-color:#ffffff;border-radius:0 0 4px 4px;width:700px;margin:auto;height:4px;">
			        </div>
			      </td>
			  </tr>
			  <tr bgcolor="#E9ECF3">
			    <td bgcolor="#E9ECF3"><table width="700" border="0" align="center" cellpadding="20" cellspacing="0">
			      <tr bgcolor="#E9ECF3">
			        <td align="center" valign="top" bgcolor="#E9ECF3">
								<p><strong> Passa Ficha</strong></p>
								<p style="font:11px normal Arial, Helvetica, sans-serif; color:#919EA6">Não responda este e-mail, ele é enviado automaticamente pelo sistema.</p>
							</td>
			      </tr>
			    </table></td>
			  </tr>  
			</table>
			</body>
			</html>
		';
		Email::sendEmail($subject,$body,$sendTo);
	}

	public static function Presenha($sendTo,$presenha){
		$subject = 'Dados de Acesso - Passa Ficha';

		$body = 
		'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Passa Ficha</title>
		</head>

		<body>
		<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="font:16px normal Arial, Helvetica, sans-serif; color:#697882;background: none repeat scroll 0 0 #E9ECF3;border-collapse:collapse;min-width:700px;table-layout: fixed;">
		  <tr>
		    <td>
		    <div style="background-color:#ffffff;border-radius:4px;width:700px;margin:20px auto;">
		      <table width="700" border="0" align="center" cellpadding="20" cellspacing="0">
		        <tr>
		          <td><a href="http://passaficha.com.br/" title="Passa Ficha"><img src="http://dev.revendamais.com.br/passa-ficha/assets/img/logo-light.png" title="Passa Ficha" /></a></td>
		        </tr>
		      </table>
		   	</div>
		   </td>
		  </tr>
		  <tr bgcolor="#E9ECF3">
		    <td>
		    	<div style="background-color:#ffffff;border-radius:4px 4px 0 0;width:700px;margin:auto;height:4px">
		      </div>
		      <table width="700" border="0" align="center" cellpadding="20" cellspacing="0">
		        <tr bgcolor="#ffffff">
		          	<td>
			            <p>Dados de Acesso:</p>
			            <p style="line-height:24px;">Login: '.$sendTo.'<br>Senha Temporária: '.$presenha.'</p>

			            <p><small>Se você não se cadastrou no site Passa Ficha, por favor, desconsidere essa mensagem.</small></p>
					</td>
		        </tr>
		      </table>
		      	<div style="background-color:#ffffff;border-radius:0 0 4px 4px;width:700px;margin:auto;height:4px;">
		        </div>
		      </td>
		  </tr>
		  <tr bgcolor="#E9ECF3">
		    <td bgcolor="#E9ECF3"><table width="700" border="0" align="center" cellpadding="20" cellspacing="0">
		      <tr bgcolor="#E9ECF3">
		        <td align="center" valign="top" bgcolor="#E9ECF3">
							<p><strong> Passa Ficha</strong></p>
							<p style="font:11px normal Arial, Helvetica, sans-serif; color:#919EA6">Não responda este e-mail, ele é enviado automaticamente pelo sistema.</p>
						</td>
		      </tr>
		    </table></td>
		  </tr>  
		</table>
		</body>
		</html>';

		Email::sendEmail($subject,$body,$sendTo);
	}




}
?>