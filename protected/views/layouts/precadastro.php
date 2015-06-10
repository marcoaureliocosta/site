<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Passa Ficha</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta content="{drescription}" name="description">
<meta content="{keyrods}" name="keywords">
<meta content="Passa Ficha" name="author">
<meta property="og:site_name" content="Passa Ficha">
<meta property="og:title" content="Passa Ficha">
<meta property="og:description" content="{description_facebook}">
<meta property="og:type" content="website">
<meta property="og:image" content="{image_facebook}">
<meta property="og:url" content="{url_facebook}">

<?php  
$cs        = Yii::app()->clientScript;
$themePath = Yii::app()->themeManager->baseUrl; 
$cs->registerCoreScript('jquery.ui', CClientScript::POS_END);
?>

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $themePath."/"; ?>assets/img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $themePath."/"; ?>assets/img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $themePath."/"; ?>assets/img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $themePath."/"; ?>assets/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $themePath."/"; ?>assets/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $themePath."/"; ?>assets/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $themePath."/"; ?>assets/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $themePath."/"; ?>assets/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $themePath."/"; ?>assets/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $themePath."/"; ?>assets/img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $themePath."/"; ?>assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $themePath."/"; ?>assets/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $themePath."/"; ?>assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php echo $themePath."/"; ?>assets/img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo $themePath."/"; ?>assets/img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link href="<?php echo $themePath."/"; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $themePath."/"; ?>assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $themePath."/"; ?>assets/css/font-awesome.min.css" rel="stylesheet">
<!-- Fonts START -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Pathway+Gothic+One|PT+Sans+Narrow:400+700|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
</head>
<body>
<video autoplay class="bgvid" loop>
	<source src='<?php echo $themePath."/"; ?>assets/video/capa.mp4' type='video/mp4'>
	<source src='<?php echo $themePath."/"; ?>assets/video/capa.webm' type='video/webm'>
	<source src='<?php echo $themePath."/"; ?>assets/video/capa.ogv' type='video/ogg'>
</video>
<div class="tp-dottedoverlay twoxtwo"></div>
<div class="content">
	<?php echo $content; ?>
</div>
<!-- GoogleAnalytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61586251-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- // GoogleAnalytics -->
<!-- ação botão Google Analytics Passa Ficha - Pre-cadastro -->
<script>		
	$('#acompanhamento-pf-pre').on('click', function() {
	 ga('send', 'event', 'pre-cadastro', 'enviado');
	});
</script>
<!-- // ação botão Google Analytics Passa Ficha - Pre-cadastro -->
</body>
</html>
