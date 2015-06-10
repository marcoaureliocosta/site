<?php $this->pageTitle = 'Minha Conta > Meus Dados'; ?>

<!-- BEGIN PAGE HEAD -->
<div class="page-head">
  <!-- 
  <div class="note note-success alert alert-success fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>Alerta de sucesso!</div>
  <div class="note note-warning alert alert-warning fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>Alerta de atenção!</div>
  <div class="note note-danger alert alert-danger fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>Alerta de erro!</div>
  -->

  <!-- BEGIN PAGE TITLE -->
  <div class="page-title">
    <h1>Minha Conta</h1>
  </div>
  <!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD -->

<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb hide">
  <li>
    <a href="#">Home</a>
    <i class="fa fa-circle"></i>
  </li>
  <li>
    Minha conta
  </li>
  <li class="active">
    Meus dados
  </li>
</ul>
<!-- END PAGE BREADCRUMB -->

<!-- BEGIN PAGE CONTENT INNER -->
<div class="row margin-top-10">
  <div class="col-md-12">
    
    <!-- BEGIN PROFILE CONTENT -->
    <div class="profile-content">
      <div class="row">
        <div class="col-md-12">
          <div class="portlet light">
            <div class="portlet-title tabbable-line">
              <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
              </div>
              <ul class="nav nav-tabs">
              	<li class="active">
                  <a href="#tab_1_1" data-toggle="tab">Meus Dados</a>
                </li>
                <?php if($model->usuario_idempresa == 0 ): ?>
                <li>
                  <a href="#tab_1_2" data-toggle="tab">Dados de Faturamento</a>
                </li> 
                <?php endif; ?>                   
              </ul>
            </div>
            <div class="portlet-body">
              <div class="tab-content">
              	<!-- CHANGE INFO TAB -->
                <div class="tab-pane active" id="tab_1_1">
                	<div class="row">
                  	<div class="col-md-12 col-lg-8">
                      <?php echo $this->renderPartial('_formMeusDados',array('model'=>$model)); ?>
                    </div>
                  </div>
                </div>

                <!-- END CHANGE AVATAR TAB -->
                <?php  
                /*
                Somente o usuário principal pode editar os dados de faturamento.
                Logo, os dados de faturamento ficam desabilitados para edição quando for um 'dependente'
                */
                if($model->usuario_idempresa == 0 ): ?>
                <!-- PERSONAL INFO TAB -->
                <div class="tab-pane" id="tab_1_2">
                  <div class="row">
                    <div class="col-md-12 col-lg-8">
                      <?php echo $this->renderPartial('_formDadosFaturamento',array('model'=>$faturamento,'disabled'=>false)); ?>
                    </div>
                  </div>
                </div>
                <!-- END PERSONAL INFO TAB -->
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END PAGE CONTENT INNER -->
</div>
