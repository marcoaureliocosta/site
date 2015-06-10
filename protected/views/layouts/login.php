<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<meta charset="utf-8"/>
	<meta name="language" content="pt_br" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="rating" content="general">
    <meta name="robots" content="index,follow,all">
    <meta name="googlebot" content="index,follow">
    <meta name="revisit-after" content="1 days">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    
    
    <meta name="generator" content="Interativ Web Marketing">
    <meta name="author" content="Interativ Web Marketing" />   

    <?php 
	$cs        = Yii::app()->clientScript;
    $themePath = Yii::app()->theme->baseUrl;
    ?>

    <link rel="shortcut icon" href="favicon.ico"/>
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo $themePath."/"; ?>assets/admin/layout/img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	<?php
    /**
     * StyleSHeets
     */
    $cs->registerCssFile($themePath . '/assets/css/bootstrap.css');
    $cs->registerCssFile($themePath . '/assets/css/bootstrap-theme.css');

    //<!-- BEGIN GLOBAL MANDATORY STYLES -->
		/*<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>*/
	//<!-- END GLOBAL MANDATORY STYLES -->

	//<!-- BEGIN PAGE LEVEL STYLES -->	
		//carrega o CSS de cada página
		//pela controller, ex: $this->cssPage[] = Caminhos::Theme().'assets/admin/pages/css/login.css';
		if(!empty($this->cssPage)){
			foreach ($this->cssPage as $url) {
				if(!empty($url))
					echo '<link href="'.$url.'" rel="stylesheet" type="text/css"/> ';
			}	
		}
	//<!-- END PAGE LEVEL SCRIPTS -->
	?>
		
	<!-- BEGIN THEME STYLES -->
		<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->	
		<link href="<?php echo Caminhos::Theme().'/'; ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
		<!-- <link href="<?php //echo Caminhos::Theme().'/'; ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/> -->
		<link href="<?php echo Caminhos::Theme().'/'; ?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo Caminhos::Theme().'/'; ?>assets/admin/layout/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>
		<link href="<?php echo Caminhos::Theme().'/'; ?>assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/> 
	<!-- END THEME STYLES -->
    

    <?php 
    /**
     * JavaScripts
     */
    //$cs->registerCoreScript('jquery', CClientScript::POS_END);
    $cs->registerCoreScript('jquery.ui', CClientScript::POS_END);
    $cs->registerScriptFile($themePath . '/assets/js/bootstrap.min.js', CClientScript::POS_END);
    //$cs->registerScript('tooltip', "$('[data-toggle=\"tooltip\"]').tooltip();$('[data-toggle=\"popover\"]').tooltip()", CClientScript::POS_READY);
    ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->theme->baseUrl . '/assets/js/html5shiv.js';?>"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl . '/assets/js/respond.min.js';?>"></script>
    <![endif]-->

    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS 
		<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>-->
		<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip 
		<script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
		<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
		<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
		<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>-->
	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->
		<script src="<?php echo Caminhos::Theme().'/'; ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
	    <?php 
		//carrega o JS de cada página
		if(!empty($this->jsPage)){
			foreach ($this->jsPage as $url) {
				if(!empty($url)){
					echo '<script src="'.$url.'" type="text/javascript"></script>';
				}
			}	
		}?>
	<!-- END PAGE LEVEL PLUGINS -->


    <!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo Caminhos::Theme().'/'; ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo Caminhos::Theme().'/'; ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
	<script src="<?php echo Caminhos::Theme().'/'; ?>assets/admin/pages/scripts/login.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
    
    
	<script>
	jQuery(document).ready(function() {    
	   Metronic.init(); // init metronic core componets
	   Layout.init(); // init layout
		 Login.init();
	});
	</script>
	    
   
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php 
	//Yii::app()->clientScript->registerMetaTag($this->getMetaDescription(), 'description');
	//Yii::app()->clientScript->registerMetaTag($this->getMetaKeywords(), 'keywords');
	?>

     
    
   

	
	
	  

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="login">

	<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
	<div class="menu-toggler sidebar-toggler">
	</div>
	<!-- END SIDEBAR TOGGLER BUTTON -->

	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="index.html">
		<img src="<?php echo $themePath."/"; ?>assets/admin/layout/img/logo-light.png" alt="Passa Ficha"/>
		</a>
	</div>
	<!-- END LOGO -->

	<div class="content">
		<?php echo $content; ?>
	</div>

	<div class="copyright">
		 <?php echo date('Y'); ?> © Passa Ficha.
	</div>

</body>
</html>


