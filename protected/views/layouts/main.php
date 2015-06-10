<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>


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
    //<!-- BEGIN GLOBAL MANDATORY STYLES -->
      //<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
      $cs->registerCssFile(Caminhos::Theme(). '/assets/global/plugins/font-awesome/css/font-awesome.min.css');
      $cs->registerCssFile($themePath . '/assets/global/plugins/simple-line-icons/simple-line-icons.min.css');
      $cs->registerCssFile($themePath . '/assets/global/plugins/bootstrap/css/bootstrap.min.css');
      $cs->registerCssFile($themePath . '/assets/global/plugins/uniform/css/uniform.default.css');
      $cs->registerCssFile($themePath . '/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');
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
  <?php $cs->registerScriptFile($themePath . '/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js', CClientScript::POS_END); ?>
  <?php $cs->registerScriptFile($themePath . '/assets/global/plugins/uniform/jquery.uniform.min.js', CClientScript::POS_END); ?>

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
    
    

      
   
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>

  <?php 
  //Yii::app()->clientScript->registerMetaTag($this->getMetaDescription(), 'description');
  //Yii::app()->clientScript->registerMetaTag($this->getMetaKeywords(), 'keywords');
  ?>

  <script type="text/javascript">
  $(document).ready(function(){
     
     Metronic.init(); // init metronic core componets
     Layout.init(); // init layout

     $('#myModal').modal('show');

     baseURL = "<?php echo Caminhos::Index(); ?>"

  });
  </script>

</head>
<!-- END HEAD -->

<?php 
$this->sidemenu=array(
        array(
          'label'=>'Manage Planos',
          'icon' => 'icon-home',
          'url'=>array('admin'),
          'active'=>Yii::app()->controller->id=='admin' ? true : false,
          //'visible'=>!Permissao::model()->getPermissaoByIDAction("156")?false:true
        ),
        array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Planos', 'url'=>array('create')),
      );
?>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo page-footer-fixed">

<!-- defaultModal -->
<div id="defaultModal" class="modal fade"  tabindex="-1" role="Dados do Usuário" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title caption-subject font-green-sharp bold uppercase"></h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!--end defaultModal -->

<!--flash Messages-->
<?php 

//flashMessages
/*
	Dispara as mensagens de alerta que possam estar setadas
	ex: Yii::app()->user->setFlash('success', "Olá, ".Usuario::model()->getNomeUsuarioLogado().". Você está logado(a)!");
*/

$flashMessages = Yii::app()->user->getFlashes();
//die('ok');
if ($flashMessages) {
?>  
<!-- Modal FLASH MESSAGES -->
<div class="modal modal-default fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Alerta</h4>
            </div>
            <div class="modal-body">
                <?php   
                    //echo '<div class="row">';
                        //echo '<div class="span12">';
                            foreach($flashMessages as $key => $message) {
                                echo '<div class="alert alert-' . $key . '"><button type="button" class="close" data-dismiss="alert">&times;</button>' . $message . "</div>";
                            }
                        //echo '</div>';
                    //echo '</div>';
                
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>

<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
      <a href="<?php echo Caminhos::Index().'/dashboard' ?>">
        <img src="<?php echo Caminhos::Theme(); ?>/assets/admin/layout/img/logo-light.png" alt="Passe Ficha" class="logo-default"/>
      </a>
      <div class="menu-toggler sidebar-toggler">
      </div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN PAGE TOP -->
    <div class="page-top">
      <!-- BEGIN HEADER SEARCH BOX -->
      <form class="search-form search-form-expanded" action="extra_search.html" method="GET">
        <div class="input-group">
          <input type="text" class="form-control input-sm" placeholder="Buscar..." name="query">
          <span class="input-group-btn">
            <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
          </span>
        </div>
      </form>
      <!-- END HEADER SEARCH BOX -->
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
          <li class="separator hide">
          </li>
          <!-- BEGIN INBOX DROPDOWN -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
              <i class="icon-envelope-open"></i>
              <span class="badge badge-danger"> 4 </span>
            </a>
            <ul class="dropdown-menu">
              <li class="external">
                <h3>You have <span class="bold">7 New</span>
                  Messages</h3>
                <a href="inbox.html">view all</a>
              </li>
              <li>
                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                  <li>
                    <a href="#">
                      <span class="photo">
                        <img src="assets/admin/pages/media/profile/avatar_user_small.png" class="img-circle" alt="{user}">
                      </span>
                      <span class="subject">
                        <span class="from"> Lisa Wong </span>
                        <span class="time"> Just Now </span>
                      </span>
                      <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="photo">
                        <img src="assets/admin/pages/media/profile/avatar_user_small.png" class="img-circle" alt="{user}">
                      </span>
                      <span class="subject">
                        <span class="from"> Richard Doe </span>
                        <span class="time"> 16 mins </span>
                      </span>
                      <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="photo">
                        <img src="assets/admin/pages/media/profile/avatar_user_small.png" class="img-circle" alt="{user}">
                      </span>
                      <span class="subject">
                        <span class="from"> Bob Nilson </span>
                        <span class="time"> 2 hrs </span>
                      </span>
                      <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="photo">
                        <img src="assets/admin/pages/media/profile/avatar_user_small.png" class="img-circle" alt="{user}">
                      </span>
                      <span class="subject">
                        <span class="from"> Lisa Wong </span>
                        <span class="time"> 40 mins </span>
                      </span>
                      <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="photo">
                        <img src="assets/admin/pages/media/profile/avatar_user_small.png" class="img-circle" alt="{user}">
                      </span>
                      <span class="subject">
                        <span class="from"> Richard Doe </span>
                        <span class="time"> 46 mins </span>
                      </span>
                      <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- END INBOX DROPDOWN -->
          <!-- BEGIN CREDIT -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          <li class="dropdown dropdown-extended">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
              <i class="icon-wallet"></i>
              <span class="badge badge-danger"> 99 </span>
            </a>
            <ul class="dropdown-menu">
              <li class="external">
                <h3>Você tem <span class="bold">99 créditos</span>
                  restantes</h3>                
              </li>
              <li>
                <ul class="dropdown-menu-list" style="height:34px;" data-handle-color="#637283">
                  <li>
                    <a href="<?php echo Caminhos::Index().'/comprar-creditos'; ?>" class="btn btn-sm green-haze btn-block">
                      <i class="icon-basket"></i> Comprar créditos
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- END CREDIT -->
          <!-- BEGIN USER LOGIN DROPDOWN -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          <li class="dropdown dropdown-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
              <span class="username username-hide-on-mobile">
              	<?php echo !Yii::app()->user->isGuest ? Usuario::model()->getNomeUsuarioLogado() : "Visitante"; ?>
              </span>
              <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
              <?php 
              if(empty(Yii::app()->user->avatar)): ?>
                <img alt="{user}" class="img-circle" src="<?php echo Caminhos::Theme(); ?>/assets/admin/pages/media/profile/avatar_user_small.png"/>
              <?php else:?>
                <img class="img-circle" src="<?php echo Caminhos::Avatar().Yii::app()->user->avatar; ?>" alt="<?php echo Usuario::model()->getNomeUsuarioLogado(); ?>"/>
              <?php endif;?>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
              <li>
                <a href="<?php echo Caminhos::Index().'/meus-dados'; ?>">
                  <i class="icon-user"></i> Meus dados </a>
              </li>
              <li>
                <a href="#">
                  <i class="icon-key"></i> Alterar senha </a>
              </li>
              <li>
                <a href="<?php echo Caminhos::Index().'/logout'; ?>">
                  <i class="icon-power"></i> Sair </a>
              </li>
            </ul>
          </li>
          <!-- END USER LOGIN DROPDOWN -->
        </ul>
      </div>
      <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END PAGE TOP -->
  </div>
  <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

<div class="clearfix"></div>

<!-- BEGIN CONTAINER -->
<div class="page-container"><?php echo $content; ?></div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="page-footer">
  <div class="page-footer-inner">
    <?php echo date('Y'); ?> &copy; Passe Ficha.
  </div>
  <div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
  </div>
</div>
<!-- END FOOTER -->

</body>
</html>
