<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'meusDados-form',
    'layout' => BSHtml::FORM_LAYOUT_HORIZONTAL,
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

  <?php echo $form->errorSummary($model); ?>

  
  <div class="form-group">
    <label class="control-label col-md-3"> Imagem </label>
    <div class="fileinput fileinput-new col-md-9" data-provides="fileinput">
      <div class="margin-right-10 fileinput-new pull-left thumbnail">
        <?php if(empty($model->avatar)): ?>
          <img style="width: 50px; height: 50px;" src="<?php echo Caminhos::Theme(); ?>/assets/admin/pages/media/profile/avatar_user.png" alt="avatar"/>
        <?php else:?>
          <img src="<?php echo Caminhos::Avatar().$model->avatar; ?>" alt="#"/>
        <?php endif;?>
      </div>
      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;">
      </div>
      <div>
        <span class="btn default btn-sm btn-file">
          <span class="fileinput-new">Alterar imagem</span>
          <span class="fileinput-exists">Trocar </span>
          <?php 
             echo $form->fileField($model, 'avatar');
          ?>
        </span>
        <a href="#" class="btn default btn-sm fileinput-exists" data-dismiss="fileinput"> Cancelar </a>
      </div>
    </div>
  </div>

  <?php echo $form->textFieldControlGroup($model,'nome',
                        array(
                            'maxlength'=>255,
                            'prepend'=>BsHtml::icon(BsHtml::GLYPHICON_USER),
                            //'groupOptions' => array('class' => 'col-lg-12'),
                            'controlOptions' => array('class' => 'col-lg-8'),
                            'labelOptions' => array('class' => 'col-lg-3'),
                        )
                    ); ?>

  <?php echo $form->textFieldControlGroup($model,'email',
                    array(
                        'maxlength'=>255,
                        'prepend'=>BsHtml::icon(BsHtml::GLYPHICON_ENVELOPE),
                        'controlOptions' => array('class' => 'col-lg-8'),
                        'labelOptions' => array('class' => 'col-lg-3'),
                    )); ?>
  
  <?php echo $form->passwordFieldControlGroup($model,'senha',
                          array(
                              'maxlength'=>125,
                              'prepend'=>BsHtml::icon(BsHtml::GLYPHICON_LOCK),
                              'controlOptions' => array('class' => 'col-lg-8'),
                              'labelOptions' => array('class' => 'col-lg-3'),
                          )); ?>
  <?php echo $form->passwordFieldControlGroup($model,'senhaNova',
                          array(
                              'maxlength'=>125,
                              'prepend'=>BsHtml::icon(BsHtml::GLYPHICON_LOCK),
                              'controlOptions' => array('class' => 'col-lg-8'),
                              'labelOptions' => array('class' => 'col-lg-3'),
                          )); ?>
  <?php echo $form->passwordFieldControlGroup($model,'senhaConfirm',
                          array(
                              'maxlength'=>125,
                              'prepend'=>BsHtml::icon(BsHtml::GLYPHICON_LOCK),
                              'controlOptions' => array('class' => 'col-lg-8'),
                              'labelOptions' => array('class' => 'col-lg-3'),
                          )); ?>                    
  
  <div class="margin-top-10 form-group">                            
    <div class="col-xs-offset-3 col-lg-8 col-md-9">
      <button class="btn green-haze"> Salvar</button>
    </div>
  </div>
<?php $this->endWidget(); ?>



