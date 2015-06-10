<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form BSActiveForm */
?>


    <?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    	'id'=>'precadastro-form',
    	// Please note: When you enable ajax validation, make sure the corresponding
    	// controller action is handling ajax validation correctly.
    	// There is a call to performAjaxValidation() commented in generated controller code.
    	// See class documentation of CActiveForm for details on this.
    	'enableAjaxValidation'=>true,
        'enableClientValidation' => true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    	'layout' => BSHtml::FORM_LAYOUT_INLINE,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

      <?php echo $form->textField($model,'email',
            array(
                'maxlength'=>255,
                'class' => 'input-lg input-cadastro',
                //'controlOptions' => array('class' => 'col-lg-8'),
                //'labelOptions' => array('class' => 'col-lg-3'),
            )); ?>


            <button class="btn btn-primary btn-lg btn-cadastro" type="submit" id="acompanhamento-pf-pre"> Pré Cadastrar </button>

    <?php $this->endWidget(); ?>


<script type="text/javascript">
    $(document).ready(function(){

        $('#precadastro-form').live('submit',function(){
            //alert('ok');

           // $('.help-block.error').css('display','none');
            var d = $(this).serialize();
            
            $.ajax({
                type: 'POST',
                url: '<?php echo Caminhos::Index();  ?>/usuario/ajaxPreCadastro',
                data: d,
                dataType: 'json',
                success:function(data){
                    //alert(data.responseText);
                    $('.alert-danger, .note-danger').each(function(){
                            $(this).remove();
                    });

                    if(data.resp){
                        //alert(data.resp)
                        $('#precadastro-form')[0].reset();
                        html1 = '<div class="alert alert-success fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>'+data.resp+'</div>';
                        
                        $('#precadastro-form').html(html1);
                    }

                    if(data.erro){
                        html = '<div class="note note-danger  fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>'+data.erro+'</div>';
                        $('#precadastro-form').prepend(html);
                    }
                    //$('#newsletter-form').html(data.responseText);
                    
                },
                error: function(data) { // if error occured
                    //alert(data.responseText);
                    //$('#precadastro-form').html(data.responseText);
                    
                    
                    
                },  
            });
            
            return false;
            
        });

    });
</script>


