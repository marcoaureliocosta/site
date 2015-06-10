<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Passa Ficha',
	'language' => 'pt_br',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		
		'application.modules.bootstrap.*',
		'application.modules.bootstrap.components.*',
		'application.modules.bootstrap.models.*',
		'application.modules.bootstrap.controllers.*',
		'application.modules.bootstrap.helpers.*',
		'application.modules.bootstrap.widgets.*',
		'application.modules.bootstrap.extensions.*',
		/*'bootstrap.*',
        'bootstrap.components.*',
        'bootstrap.models.*',
        'bootstrap.controllers.*',
        'bootstrap.helpers.*',
        'bootstrap.widgets.*',
        'bootstrap.extensions.*',
        'chartjs.*',
        'chartjs.widgets.*',
        'chartjs.components.*',*/
	),
	'theme'=>'bootstrap',//padrão metronic
	'modules'=>array(
		'bootstrap' => array(
            'class' => 'bootstrap.BootStrapModule'
        ),
		// uncomment the following to enable the Gii tool
		/*'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),*/

		/**/
	),
	'aliases' => array(
        'bootstrap' => 'application.modules.bootstrap',
        'chartjs' => 'application.modules.bootstrap.extensions.yii-chartjs-master'
    ),

	// application components
	'components'=>array(
		'bsHtml' => array('class' => 'bootstrap.components.BSHtml'),
		'chartjs'=>array('class' => 'chartjs.components.ChartJs'),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'caseSensitive'=>false,
			'showScriptName'=>false,   // Disable index.phps
			//'useStrictParsing'=>true,
			'rules'=>array(
				//''=>'site/index',
				'login'=>'site/login',
				'logout'=>'site/logout',
				'dashboard'=>'site/dashboard',

				/*Usuario*/
				//'meu-cadastro'=>'usuario/meuCadastro',
				'meus-dados'=>'usuario/meusDados',
				'configurar-usuarios'=>'usuario/admin',
				'active-token'=>'usuario/activeToken',
				'recuperar-senha'=>'usuario/recuperarSenha',

					/*'meus-dados/<nome:.*?>'=>'usuario/updatePerfil/',*/
				/*'alterar-senha'=>'usuario/updateSenha',*/

				/*Planos*/
				'comprar-creditos'=>'planos/',

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			/*'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',*/
	
			//Postegre
			'tablePrefix'=>'',
	        'connectionString' => 'pgsql:host=localhost;port=5432;dbname=passaficha',
	        'username'=>'postgres',
	        'password'=>'',
	        'charset'=>'UTF8',

		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);