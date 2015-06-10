<?php

class SiteController extends Controller
{
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
			array('allow',  // allow loged users to perform 
				'actions'=>array('logout','dashboard'),
				'users'=>array('@'),
			),
			array('allow',  // deny all users
				'actions'=>array('login','index')
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionDashboard(){
		$this->layout = 'column2'; 
		$this->render('dashboard');
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		//Yii::app()->themeManager->basePath .= '/precadastro';
        Yii::app()->themeManager->baseUrl .= '/precadastro';
		Yii::app()->theme = 'precadastro'; 

		$this->layout = 'precadastro'; 

		//novo usuario
		$model = new Usuario;
		$model->scenario = 'precadastro';

		$model->tipoUsuario = 0;//cliente
		$model->tipoPessoa = 0;//pf
		$model->usuario_idempresa = 0;//id da empresa que esse usuário pertence;
		$model->status = 2;//0=excluído 1=Ativo 2=Aguardando confirmação



		$this->render('index',array('model'=>$model));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{

		//verifica se o usuario esta logado
		if(!Yii::app()->user->isGuest){//se sim
			//var_dump(Yii::app()->user);die;
			$this->redirect(Caminhos::Index().'/dashboard');
		}

		$this->layout = 'login';
		$this->cssPage[] = Caminhos::Theme().'/assets/admin/pages/css/login.css';
		
		//model para formulario de Login, para usuário já cadastrados
		$model=new LoginForm;

		//model para formulario de 'Criar Conta', para usuário NAO cadastrados
		$usuario = new Usuario;
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			
			echo CActiveForm::validate($usuario);
			Yii::app()->end();
		}


		// Login
		if(isset($_POST['LoginForm']))
		{
			
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				//var_dump($_POST['LoginForm']);die('ok');
				Yii::app()->user->setFlash('success', "Olá, ".Usuario::model()->getNomeUsuarioLogado().". Você está logado(a)!");
				$this->redirect(Caminhos::Index().'/dashboard');
			}
		}
		//var_dump($_POST);die('ij');

		//criar conta
		if(isset($_POST['Usuario']))
		{
			//var_dump($_POST);die('ij');
			$usuario->attributes=$_POST['Usuario'];

			$usuario->tipoUsuario = 0;//0=cliente
			$usuario->tipoPessoa = 0;//0=pf
			$usuario->status = 1;//1=ativo
			$presenha = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);//pré-senha
			$usuario->senha = md5($presenha);
			
			// validate user input and redirect to the previous page if valid
			if($usuario->validate()){
				
				$usuario->save();//salva os dados do novo cliente e ja faz login
				
				$login = new LoginForm;
				$login->password = $presenha;
				$login->username = $usuario->email;
				$login->login();

				//$model->login();
				//var_dump($_POST['LoginForm']);die('ok');
				Yii::app()->user->setFlash('success', "Olá, ".Usuario::model()->getNomeUsuarioLogado().". Seu cadastro está quase pronto. Verifique seu email e confirme seu cadastro para continuar usando o sistema!");
				$this->redirect(Caminhos::Index().'/meus-dados');
			}
		}

		// display the login form
		$this->render('login',array(
			'model'=>$model,
			'usuario'=>$usuario
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

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Caminhos::Index()."/login");
	}
}