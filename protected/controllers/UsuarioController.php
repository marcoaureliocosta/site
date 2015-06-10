<?php
require 'php/class.upload.php';
class UsuarioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			
			/*array('allow',
				'actions'=>array(''),
				//'expression'=>'Usuario::model()->getTipoUsuario() == 1',//administrador
			),*/
			array('allow',
				'actions'=>array(
					'meusDados',//meus-dados
					'admin',//configurar-usuarios
					'ajaxView',//função usada  ao clicar na coluna de 'nome' na página de 'configurações > usuarios'
					'ajaxCreate',//função usada  no botão de 'novo' na página de 'configurações > usuarios'
					'ajaxUpdate',//função usada  no botão de 'editar' na página de 'configurações > usuarios'
					'ajaxUpdateStatus',//função usada  no botão de 'ativar/desativar' na página de 'configurações > usuarios'
					'delete',//função usada  no botão de 'excluir' na página de 'configurações > usuarios'
					'ajaxReenviarConvite'///função usada  no botão de 'Renviar convite' na página de 'configurações > usuarios' na coluna de 'status'
				),
				'users'=>array('@'),//logados
			),
			array('allow',
				'actions'=>array(
					'activeToken',//active-token; URL para ativação de precadastro
					'ajaxPreCadastro',//formulário de pre-cadastro na index.php
				)
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$m = $this->loadModel($id);
			$m->status = 3;//excluído
			$m->save(false);
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	//URL para ativação de precadastro
	public function actionActiveToken(){
		
		if(!isset($_GET['t']) && empty($_GET['t'])){
			throw new CHttpException(404,'Token inválido!');
		}

		$u = Usuario::model()->findAllByAttributes(array('status'=>2));//2=aguardando confirmação
		
		if(!empty($u)){
			
			$valid = false;
			foreach ($u as $v) {//percorre todos os usuarios que estao aguardando ativaçao
				
				if(md5($v->email) == $_GET['t']){//2=aguardando confirmacao
					
					$v->status = 1;//0=excluído 1=Ativo 2=Aguardando confirmação
					
					$presenha = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);//pré-senha
					$v->senha = md5($presenha);

					$v->save(false);

					Email::Presenha($v->email,$presenha);

					/*Faz login*/
					$login = new LoginForm;
					$login->password = $presenha;
					$login->username = $v->email;
					$login->login();


					
					//break;
					Yii::app()->user->setFlash('success', "<strong>Parabéns! Seu usuário foi ativado com sucesso.<strong><br>Verifique sua senha temporária em seu email.");
					//$this->redirect(Caminhos::Index().'/meus-dados');
					$this->render('confirmacaoPrecadastro');
					$valid = true;

					break;
				}
			}

			if(!$valid){
				die(utf8_decode("Token inválido!"));
			}



			//se nao foi encontrado nada no foraech acima é pq o token nao existe
			//die('Token inválido!');



		}else{
			Yii::app()->user->setFlash('warning', "Token inválido!");
			throw new CHttpException(404,'Token inválido!');
		}
		

	}

	//atualiza o status para 'ativado/desativado'
	public function actionAjaxUpdateStatus($id)
	{
		$model=$this->loadModel($id);
		//$this->layout = false;

		if(isset($_POST['status'])&&($_POST['status']==1||$_POST['status']==0))
		{
			
			if($model->status == 1){//ativo
				$model->status = 0;
				$model->save(false);
				echo json_encode(array('resp'=>'Salvo com sucesso!'));
				Yii::app()->end();	
			}elseif($model->status == 0 || $model->status == 2){//0=inativo 1=Ativo 2=Aguardando confirmação 3=excluído
				$model->status = 1;
				$model->save(false);
				echo json_encode(array('resp'=>'Salvo com sucesso!'));
				Yii::app()->end();	
			}elseif($model->status == 3){//0=inativo 1=Ativo 2=Aguardando confirmação 3=excluído
				$model->status = 2;
				$model->save(false);
				echo json_encode(array('resp'=>'Salvo com sucesso!'));
				Yii::app()->end();	
			}
			
		}

		Yii::app()->end();	
	}

	//reenvia o convite via email para um usuário que esta 'aguardando confirmação'
	public function actionAjaxReenviarConvite()
	{
		if(isset($_POST['id'])&&$_POST['id']>0)
		{
			$model=$this->loadModel($_POST['id']);
			if(!empty($model)){
				/*
					Dispara o email de Confirmação de Cadastro
				*/
				$tokenDeConfirmacao = md5($model->email);
				Email::ConfirmacaoPreCadastro($model->email,$tokenDeConfirmacao);
				echo json_encode(array('resp'=>'Um email foi enviado para '.$model->email.'. Aguarde a confirmação do cadastro.'));
				Yii::app()->end();
			}else{
				echo json_encode(array('resp'=>'Falha no envio!'));
				Yii::app()->end();
			}

		}

		Yii::app()->end();	
	}

	public function actionMeusDados()//meus-dados
	{
		//$this->layout = 'painelUsuario';
		$model = $this->loadModel(Usuario::model()->getIDUsuario());
		$model->scenario = 'meusDados';

		$faturamento = $this->loadModel(Usuario::model()->getIDUsuario());
		$faturamento->scenario = 'dadosFaturamento';
	
		$this->cssPage[] = Caminhos::Theme().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css';
		
		$this->jsPage[] = Caminhos::Theme().'/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js';
		$this->jsPage[] = Caminhos::Theme().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js';
		$this->jsPage[] = Caminhos::ROOT().'/js/jquery.maskedinput-1.2.2.min.js';

		if(Yii::app()->user->isGuest && !$model){
			throw new CHttpException(404,'Sua requisição é inválida.');
		}


		if(isset($_POST['Usuario']))
		{
			//var_dump($_POST);die;
			$senhaAtual = $model->senha;
			
			$model->attributes=$_POST['Usuario'];
			$faturamento->attributes=$_POST['Usuario'];
			
			if(isset($_POST['Usuario']['inscricaoEstadual'])){
				$model->inscricaoEstadual = (int)$_POST['Usuario']['inscricaoEstadual'];
			}
			
			/*
				meus dados
			*/
			//ajax validation
			if(isset($_POST['ajax']) && $_POST['ajax']==='meusDados-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}

			/*
				dados Faturamento
			*/
			//ajax validation
			if(isset($_POST['ajax']) && $_POST['ajax']==='dadosFaturamento-form')
			{
				echo CActiveForm::validate($faturamento);
				Yii::app()->end();
			}
			
			if(isset($_POST['Usuario']['senha'])){//meus dados
				if($senhaAtual != md5($_POST['Usuario']['senha'])){
					$model->addError('senha','Senha Atual não confere!');
				}
				if(isset($_POST['Usuario']['senhaNova']) && $_POST['Usuario']['senhaNova'] <> '' && $senhaAtual == md5($_POST['Usuario']['senhaNova'])){
					$model->addError('senhaNova','A nova senha deve ser diferente da atual.');
				}


				//recebe a imagem do Avatar do usuario
				$x = CUploadedFile::getInstance($model,'avatar');
				/*
					se foi enviada uma FOTO
				*/
				$pasta = './images/avatar';
				if(!empty($x)){
					
					$nomeNovo = $this->generateUniqueToken($model->email);
					$nomeArquivo = '';

					//tranforma de um 'objeto' para um 'array'
					$y = array('name'=>$x->name,'type'=>$x->type,'tmp_name'=>$x->tempName,'error'=>$x->error,'size'=>$x->size);
					$upload = new upload($y);
					
					if ($upload->uploaded):
					
						//verifica se o arquivo já existe
						$nomeArquivo = $nomeNovo.'.'.$upload->file_src_name_ext;
						if(file_exists($pasta.$nomeArquivo)):
							unlink($pasta.$nomeArquivo);
						endif;

						//var_dump($nomeArquivo);die("aqui");

						$upload->image_ratio_crop = true;
						$upload->allowed = array('image/*');
						$upload->file_new_name_body	= $nomeNovo;
						$upload->image_resize = true;
						
						//$width =  $upload->image_src_x;//largura da imagem recebida
						//$height =  $upload->image_src_y;//altura da imagem recebida

						$upload->image_x = 200;
						$upload->image_y = 200;

						$upload->process($pasta);

						if ($upload->processed):
							
							//se foi enviado um novo avatar, remove o avatar antigo da pasta para nao sobrecarregar o servidor com lixo
							if($model->avatar != '' && file_exists($pasta.'/'.$model->avatar)):
								chmod ($pasta."/", 0755);// Tudo para o proprietario, leitura e execucao para os outros
								unlink($pasta.'/'.$model->avatar);
							endif;
							
							$model->avatar = $nomeArquivo;//novo avatar
							Yii::app()->user->setState('avatar', $nomeArquivo);//atualiza o avatar em Yii::app()->user->avatar
							

						else:
							$erro = $upload->error;
							$model->addError('email', $upload->error);
						endif;
					endif;
				}


				if(!$model->getErrors()&&$model->validate()){
					
					if(isset($_POST['Usuario']['senhaNova']) && $_POST['Usuario']['senhaNova'] != ''){
						$model->senha = md5($_POST['Usuario']['senhaNova']);
					}else{
						$model->senha = $senhaAtual;
					}
				
					if($model->save()){
						
						if(isset($_POST['Usuario']['senhaNova']) && $_POST['Usuario']['senhaNova'] != ''){
							Yii::app()->user->setFlash('warning', "Senha alterada! Na próxima vez que fizer login use sua nova senha!");
						}
						Yii::app()->user->setFlash('success', "Dados atualizados com sucesso!");

						//reseta o campo de senha
						$model->senha = '';
						$model->senhaNova = '';
						$model->senhaConfirm = '';
					}
				}
			}else{//dados Faturamento
				
				if(!$faturamento->getErrors()&&$faturamento->validate()){
					$faturamento->tipoPessoa = 1;//PJ
					if($faturamento->save()){
						Yii::app()->user->setFlash('success', "Dados de faturamento definidos com sucesso!");
					}
				}
			}
		}
		
		$model->senha = '';
		
		
		
		$this->render('meusDados',array(
			//'model'=>$this->loadModel(Usuario::getIDUsuario()),
			'model'=>$model,
			'faturamento'=>$faturamento
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		
		$id = Usuario::getIDUsuario();
		//$model->idusuario = $id;
		//$model->usuario_idempresa = $id;



		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	} 


	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionAjaxCreate()
	{
		$model=new Usuario;
		$model->scenario = 'ajaxCreate';
		$model->tipoUsuario = 0;//cliente
		$model->tipoPessoa = 0;//pf
		$model->status = 2;//0=excluído 1=Ativo 2=Aguardando confirmação

		

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{

			$model->attributes=$_POST['Usuario'];
			$model->usuario_idempresa = Usuario::getIDUsuario();//id da empresa que esse usuário pertence;
			
			if($model->validate()&&!$model->getErrors()){
				$model->save(false);
				//var_dump($model);die();
				/*
					Dispara o email de Confirmação de Cadastro
				*/
				$tokenDeConfirmacao = md5($model->email);
				Email::ConfirmacaoPreCadastro($model->email,$tokenDeConfirmacao);
				echo json_encode(array('resp'=>'Pré-cadastrado efetuado com sucesso!Um email foi enviado para '.$model->email.'. Aguarde a confirmação do cadastro.'));
				Yii::app()->end();
			}
		}

		$this->renderPartial('_ajaxCreate',array(
			'model'=>$model,
		));

		Yii::app()->end();

	}

	public function actionAjaxPreCadastro()
	{
		$model=new Usuario;
		$model->scenario = 'precadastro';
		$model->tipoUsuario = 0;//cliente
		$model->tipoPessoa = 0;//pf
		$model->usuario_idempresa = Usuario::getIDUsuario();//id da empresa que esse usuário pertence;
		$model->status = 2;//0=excluído 1=Ativo 2=Aguardando confirmação

		$this->performAjaxValidation($model);

		if(isset($_POST['Usuario'])){
			
			/*$u = Usuario::model()->findAll(array('condition'=>'idusuario > 15'));
			
			foreach ($u as $v) {
				$v->delete();
			}var_dump($u);die;*/

			$model->email=$_POST['Usuario']['email'];
			if($model->save()){
				/*
					Dispara o email de Confirmação de Cadastro
				*/
				$tokenDeConfirmacao = md5($model->email);
				Email::ConfirmacaoPreCadastro($model->email,$tokenDeConfirmacao);

				echo json_encode(array('resp'=>'<strong>Pré-cadastrado efetuado com sucesso!</strong><br>Verifique seu email e confirme seu cadastrado para começar a usuar o sistema.'));
				Yii::app()->end();
			}else{
				//var_dump($model->getErrors()['email'][0]);die('iojk');
				echo json_encode(array('erro'=>$model->getErrors()['email'][0]));
				Yii::app()->end();
			}
		}
		

		$this->renderPartial('_formPreCadastro',array(
			'model'=>$model,
		));

		Yii::app()->end();
	}

	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionAjaxUpdate($id)
	{
		$model=$this->loadModel($id);
		$model->scenario = 'ajaxUpdate';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			
			if($model->save()){
				echo json_encode(array('resp'=>'Atualizado com sucesso!'));
				Yii::app()->end();
			}
		}

		$this->renderPartial('_ajaxUpdate',array(
			'model'=>$model,
		));
	}

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionAjaxView($id)
	{
		$this->renderPartial('view',array(
			'model'=>$this->loadModel($id),
		));
	} 

	public function generateUniqueToken($username){

	    $rand = mt_rand(100,999);
	    $md5 = md5('!(&^ 532567_465 ///'.$username);

	    $md53 = substr($md5,0,5);
	    $md5_remaining = substr($md5,5);

	    $md5 = $md53. $rand. $md5_remaining;

	    return $md5;
	}

	public function actionRecuperarSenha()
	{
		$usuario = new ResetPassword;
		$this->bannerPrincipal = false;

		//ajax validation
		if(isset($_POST['ajax']) && $_POST['ajax']==='resetPassword-form')
		{
			echo CActiveForm::validate($usuario);
			Yii::app()->end();
		}

		if(isset($_POST['ResetPassword']))
		{
			$usuario->attributes=$_POST['ResetPassword'];
			
					
			//var_dump($_POST['ResetPassword']);die;
			$checkEmail = Usuario::model()->findByAttributes(array('email'=>$usuario->email));
			
			if(empty($checkEmail)){
				//var_dump($usuario->attributes);die;
				//se nao for encontrado é pq nao é um usuario cadastrado
				$usuario->addError('email','Usuário não cadastrado!');
				
				Yii::app()->user->setFlash('error','O email informado não foi encontrado em nossa base de dados.<br>Certifique-se que informou o email corretamente e tente novamente.');	
				//$this->refresh();
				
			
			}
			//die('ij');

			if(!$usuario->getErrors())
			{
				//echo $checkEmail->email; die;
					//VerificationCode
					//$hash = md5($checkEmail->email.strtotime($checkEmail->dataCriacao));
					$hash = md5($checkEmail->email.strtotime(FormataData::getTimestamp()));
					
					$passwordRecover = new PasswordRecover;
					$passwordRecover->IDUsuario = $checkEmail->IDUsuario;
					$passwordRecover->VerificationCode = $hash;
					$passwordRecover->dataExpiracao = date('Y-m-d H:i:s', strtotime("+45 minutes",strtotime(FormataData::getTimestamp())));//echo date('d/m/Y H:i:s', strtotime("+1 minute",strtotime($checkEmail->dataCriacao)));
					$passwordRecover->status = 1;//ativo
					$passwordRecover->ip = $this->getIp();
					
					if($passwordRecover->save()){
				
						$dados = array(
							'verificationCode'=>$passwordRecover->VerificationCode,
							'email'=>$usuario->email,
							'nome'=>$checkEmail->nomeUsuario
						);
						
						Email::resetPassword($dados);
						
						Yii::app()->user->setFlash('success','Verifique seu email e siga as instruções para redefinir sua senha!');
						//$this->refresh();
						$usuario->unsetAttributes();
					
					}else{
						throw new CHttpException(400,'Requisição inválida. Entre em contato com o administrador.');
						//var_dump($passwordRecover->getErrors());
						//die;
					}
				
			
			}//fim validete()
		}
		
		$this->render('recuperar-senha',array('usuario'=>$usuario));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


}
