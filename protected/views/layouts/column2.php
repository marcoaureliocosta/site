<?php $this->beginContent('//layouts/main'); ?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
	  <!-- BEGIN SIDEBAR MENU -->
	  <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
	  <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
	  <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
	  <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	  <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
	  <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	  <?php
			$this->sidemenu=array(
				array(
					'label'=>'Painel',
					'icon' => 'icon-home',
					'url'=>array('//dashboard'),
					'active'=>strtolower(Yii::app()->controller->id)=='site' && strtolower(Yii::app()->controller->action->id)=='index' ? true : false,
					//'visible'=>!Permissao::model()->getPermissaoByIDAction("156")?false:true
				),
				array(
					'label'=>'Minha Conta',
					'icon' => 'icon-home',
					'url'=>array('#'),
					'active'=>strtolower(Yii::app()->controller->id)=='usuario'&&strtolower(Yii::app()->controller->action->id)=='meusdados'  ? true : false,
					//'visible'=>!Permissao::model()->getPermissaoByIDAction("156")?false:true
					'items'=>array(
						 array(
						 	'label'=>'Meus Dados', 
						 	'url'=>array('//meus-dados'),
						 	'icon' => 'icon-user',
						 	'active'=>strtolower(Yii::app()->controller->action->id)=='meusdados' ? true : false,
						 ),
					),
				),
				array(
					'label'=>'Configurações',
					'icon' => 'icon-wrench',
					'url'=>array('#'),
					'active'=>strtolower(Yii::app()->controller->id)=='usuario' && strtolower(Yii::app()->controller->action->id)=='admin' ? true : false,
					//'visible'=>!Permissao::model()->getPermissaoByIDAction("156")?false:true
					'items'=>array(
						 array(
						 	'label'=>'Usuários', 
						 	'url'=>array('//configurar-usuarios'),
						 	'icon' => 'icon-user',
						 	'active'=>strtolower(Yii::app()->controller->action->id)=='admin' ? true : false,
						 ),
					),
				),
				
			);


			$this->widget('bootstrap.widgets.TbMenu', array(
				'items'=>$this->sidemenu,
				'htmlOptions'=>array('class'=>'page-sidebar-menu','data-keep-expanded'=>'false','data-auto-scroll'=>'false','data-slide-speed'=>'200'),
				'submenuHtmlOptions'=>array('class'=>'sub-menu'),
				
			));
			
		?>

	  <!-- END SIDEBAR MENU -->
	</div>
</div>
<!-- END SIDEBAR -->

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">		
		<!-- BEGIN PAGE BREADCRUMB -->
		<!-- <ul class="page-breadcrumb breadcrumb hide">
			<li>
			  <a href="#">Home</a>
			  <i class="fa fa-circle"></i>
			</li>
			<li class="active">
			  Dashboard
			</li>
		</ul> -->
		<!-- BsBreadcrumb -->
	      <?php if(isset($this->breadcrumbs)):?>
	          <?php $this->widget('bootstrap.widgets.BsBreadcrumb', array(
	              'links'=>$this->breadcrumbs,
	              //'htmlOptions'=>array('class'=>"")
	          )); ?><!-- breadcrumbs -->
	      <?php endif; ?>
		<!-- END PAGE BREADCRUMB -->

		<!-- BEGIN PAGE CONTENT INNER -->
		<?php echo $content; ?>
		<!-- END PAGE CONTENT INNER -->
	</div>
</div>
<!-- END CONTENT -->

<?php $this->endContent(); ?>