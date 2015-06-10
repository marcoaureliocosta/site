

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'resetPassword-form',
	'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
	));
	//'enableAjaxValidation'=>true,
	//'enableClientValidation'=>true,
	//'action' => Yii::app()->createUrl('agendaUsuario/create'),
	//'clientOptions' => array(//'validateOnSubmit' => true,
							 //'validateOnChange' => false,
							 //'submitViaAjax' => true,
							 //'submitResponseType' => 'json',
							 //'afterFormSubmitted' => 'js:function(json) { alert (1); }'),
	//)
//); ?>

	<?php //echo $form->errorSummary($usuario); ?>

    
        <?php echo $form->textFieldRow($usuario,'email',array('size'=>60,'maxlength'=>255)); ?>
       
	<?php if(CCaptcha::checkRequirements()): ?>
		<?php echo $form->labelEx($usuario,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($usuario,'verifyCode'); ?>
		</div>
		<!--<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>-->
		<?php echo $form->error($usuario,'verifyCode'); ?>
	<?php endif; ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'success',
            'label'=>'Enviar',
        )); ?>
    </div>

<?php $this->endWidget(); ?>





