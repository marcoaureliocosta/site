<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form BSActiveForm */
?>


<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'layout' => BSHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'tipoUsuario'); ?>

            <?php echo $form->textFieldControlGroup($model,'tipoPessoa'); ?>

            <?php echo $form->textAreaControlGroup($model,'cpf',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'cnpj',array('rows'=>6)); ?>

            <?php echo $form->textFieldControlGroup($model,'inscricaoEstadual'); ?>

            <?php echo $form->textAreaControlGroup($model,'nomeFantasia',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'razaoSocial',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'email',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'senha',array('rows'=>6)); ?>

            <?php echo $form->textFieldControlGroup($model,'status'); ?>

            <?php echo $form->textFieldControlGroup($model,'usuario_idempresa'); ?>

            <?php echo $form->textAreaControlGroup($model,'telefone1',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'telefone3',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'url',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'cep',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'endereco',array('rows'=>6)); ?>

            <?php echo $form->textFieldControlGroup($model,'numero'); ?>

            <?php echo $form->textAreaControlGroup($model,'complemento',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'bairro',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'cidade',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'estado',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'pais',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'nacionalidade',array('rows'=>6)); ?>

            <?php echo $form->textFieldControlGroup($model,'cpfDataEmissao'); ?>

            <?php echo $form->textAreaControlGroup($model,'rg',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'rgDataEmissao',array('rows'=>6)); ?>

            <?php echo $form->textFieldControlGroup($model,'rgDataVencimento'); ?>

            <?php echo $form->textAreaControlGroup($model,'rgUfEmissor',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'naturalidade',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'naturalidadeUf',array('rows'=>6)); ?>

            <?php echo $form->textFieldControlGroup($model,'dataNascimento'); ?>

            <?php echo $form->textFieldControlGroup($model,'estadoCivil'); ?>

            <?php echo $form->textFieldControlGroup($model,'sexo'); ?>

            <?php echo $form->textAreaControlGroup($model,'nomePai',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'nomeMae',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'escolaridade',array('rows'=>6)); ?>

            <?php echo $form->textFieldControlGroup($model,'dependentes'); ?>

            <?php echo $form->textFieldControlGroup($model,'deficienteFisico'); ?>

            <?php echo $form->textAreaControlGroup($model,'nome',array('rows'=>6)); ?>

            <?php echo $form->textAreaControlGroup($model,'emailNfe',array('rows'=>6)); ?>

            <?php echo BSHtml::formActions(array(
    BSHtml::submitButton('Submit', array('color' => BSHtml::BUTTON_COLOR_PRIMARY)),
)); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->