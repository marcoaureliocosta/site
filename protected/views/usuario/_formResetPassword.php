
	<div class="span6 offset3">
<div class="center">
	<h3 class="text-warning">Esqueci minha senha</h3>
	<p class="alert alert-warning">Preencha o formulário abaixo com uma nova senha!</p>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'usuario-form',
	'htmlOptions' => array('class' => 'well'), // for inset effect
	 'type' => 'horizontal',
	'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
)); ?>

	<?php //echo $form->errorSummary($usuario); ?>

        
    	
            <?php echo $form->passwordFieldRow($usuario,'senha',array('size'=>60,'maxlength'=>125)); ?>
            <?php echo $form->passwordFieldRow($usuario,'senhaConfirm',array('size'=>60,'maxlength'=>125)); ?>

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'success',
                'label'=>'Salvar',
            )); ?>
        </div>

<?php $this->endWidget(); ?>

</div>