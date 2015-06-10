<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form BSActiveForm */
?>
<p>Insira o nome e email do usuário a ser convidado e clique em Enviar convite.</p>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    	'id'=>'ajaxCreateUsuario-form',
    	// Please note: When you enable ajax validation, make sure the corresponding
    	// controller action is handling ajax validation correctly.
    	// There is a call to performAjaxValidation() commented in generated controller code.
    	// See class documentation of CActiveForm for details on this.
    	'layout' => BSHtml::FORM_LAYOUT_HORIZONTAL,
        'enableAjaxValidation' => false,
    )); ?>


            <?php echo $form->errorSummary($model); ?>

            

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

            

            <div class="margin-top-10 form-group">                            
                <div class="col-xs-offset-3 col-lg-8 col-md-9">
                  <button type="submit" class="btn green-haze" >Enviar convite <i class="m-icon-swapright m-icon-white"></i></button>
                  <button type="button" class="btn default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$(document).ready(function(){
   
   $('#ajaxCreateUsuario-form').submit(function(){
       $.ajax({
            type: "POST",
            url: baseURL+'/usuario/ajaxCreate',
            data: $(this).serialize(),
            dataType: 'json',
            success:function(data){
                if(data.resp){
                    $.fn.yiiGridView.update('usuario-grid');
                    $('#defaultModal').modal('hide');
                    alert(data.resp);
                }
            },
            error:function(data){
               $('#defaultModal .modal-body').html('').html(data.responseText);
            }
        });
        return false; 
    });

});
</script>