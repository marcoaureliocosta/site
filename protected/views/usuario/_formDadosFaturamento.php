<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'dadosFaturamento-form',
    'layout' => BSHtml::FORM_LAYOUT_HORIZONTAL,
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    //'htmlOptions'=>array('class'=>'meusDados-form')
)); ?>

  <?php echo $form->errorSummary($model); ?>

  <?php echo $form->textFieldControlGroup($model,'razaoSocial',
                        array(
                                'disabled' => $disabled,
                                'maxlength'=>255,
                                //'groupOptions' => array('class' => 'col-lg-12'),
                                'controlOptions' => array('class' => 'col-lg-8'),
                                'labelOptions' => array('class' => 'col-lg-3'),
                            )
                        ); ?>
  
  <?php echo $form->textFieldControlGroup($model,'nomeFantasia',
                        array(
                                'disabled' => $disabled,
                                'maxlength'=>255,
                                //'groupOptions' => array('class' => 'col-lg-12'),
                                'controlOptions' => array('class' => 'col-lg-8'),
                                'labelOptions' => array('class' => 'col-lg-3'),
                            )
                        ); ?>                    

  <?php echo $form->textFieldControlGroup($model,'cnpj',
                      array(
                              'disabled' => $disabled,
                              'maxlength'=>18,
                              //'groupOptions' => array('class' => 'col-lg-12'),
                              'controlOptions' => array('class' => 'col-lg-8'),
                              'labelOptions' => array('class' => 'col-lg-3'),
                          )
                      ); ?>

  <?php echo $form->textFieldControlGroup($model,'inscricaoEstadual',
                      array(
                              'disabled' => $disabled,
                              'maxlength'=>25,
                              //'groupOptions' => array('class' => 'col-lg-12'),
                              'controlOptions' => array('class' => 'col-lg-8'),
                              'labelOptions' => array('class' => 'col-lg-3'),
                          )
                      ); ?>

  <?php echo $form->textFieldControlGroup($model,'telefone1',
                      array(
                              'disabled' => $disabled,
                              'maxlength'=>14,
                              //'groupOptions' => array('class' => 'col-lg-12'),
                              'controlOptions' => array('class' => 'col-lg-8'),
                              'labelOptions' => array('class' => 'col-lg-3'),
                          )
                      ); ?>
  <?php echo $form->textFieldControlGroup($model,'emailNfe',
                    array(
                        'disabled' => $disabled,
                        'maxlength'=>255,
                        //'prepend'=>BsHtml::icon(BsHtml::GLYPHICON_ENVELOPE),
                        'controlOptions' => array('class' => 'col-lg-8'),
                        'labelOptions' => array('class' => 'col-lg-3'),
                    )); ?>

  <?php echo $form->textFieldControlGroup($model,'url',
                    array(
                        'disabled' => $disabled,
                        'maxlength'=>255,
                        //'prepend'=>BsHtml::icon(BsHtml::GLYPHICON_GLOBE),
                        'controlOptions' => array('class' => 'col-lg-8'),
                        'labelOptions' => array('class' => 'col-lg-3'),
                    )); ?>

  <?php echo $form->textFieldControlGroup($model,'cep',array(
                'disabled' => $disabled,
                'maxlength'=>16,
                'help'=>'Digite o CEP para buscar o end.',
                'controlOptions' => array('class' => 'col-lg-8'),
                'labelOptions' => array('class' => 'col-lg-3'),
            )); ?>

    <?php echo $form->textFieldControlGroup($model,'endereco',array(
        'disabled' => $disabled,
        'maxlength'=>255,
        'controlOptions' => array('class' => 'col-lg-8'),
        'labelOptions' => array('class' => 'col-lg-3'),
    )); ?>

    <?php echo $form->textFieldControlGroup($model,'numero',array(
        'disabled' => $disabled,
        'maxlength'=>16,
        //'groupOptions' => array('class' => 'col-lg-3'),
        'controlOptions' => array('class' => 'col-lg-8'),
        'labelOptions' => array('class' => 'col-lg-3'),
    )); ?>

    <?php echo $form->textFieldControlGroup($model,'complemento',array(
        'disabled' => $disabled,
        'maxlength'=>255,
        //'groupOptions' => array('class' => 'col-lg-5'),
        'controlOptions' => array('class' => 'col-lg-8'),
        'labelOptions' => array('class' => 'col-lg-3'),
    )); ?>

    <div class="clearfix"></div>

    <?php echo $form->textFieldControlGroup($model,'bairro',array(
        'disabled' => $disabled,
        'maxlength'=>255,
        'controlOptions' => array('class' => 'col-lg-8'),
        'labelOptions' => array('class' => 'col-lg-3'),
    )); ?>

    <?php echo $form->textFieldControlGroup($model,'cidade',array(
        'disabled' => $disabled,
        'maxlength'=>50,
        'controlOptions' => array('class' => 'col-lg-8'),
        'labelOptions' => array('class' => 'col-lg-3'),
    )); ?> 

    <?php 
    echo $form->dropDownListControlGroup($model,'estado',$this->estados,array(
        'disabled' => $disabled,
        'empty'=>'-- Selecione o Estado --',
        'maxlength'=>2,
        'controlOptions' => array('class' => 'col-lg-8'),
        'labelOptions' => array('class' => 'col-lg-3'),
    )); ?>  

    <?php 
    echo $form->dropDownListControlGroup($model,'pais',array('Brasil'=>'Brasil'),array(
        'disabled' => $disabled,
        //'empty'=>'-- Selecione o País --',
        'maxlength'=>45,
        'controlOptions' => array('class' => 'col-lg-8'),
        'labelOptions' => array('class' => 'col-lg-3'),
    )); ?>                                      



  
  <div class="margin-top-10 form-group">                            
    <div class="col-xs-offset-3 col-lg-8 col-md-9">
      <button <?php echo $disabled ? "disabled" : ""; ?> class="btn green-haze"> Salvar</button>
    </div>
  </div>
<?php $this->endWidget(); ?>

<script type="text/javascript">
$(document).ready(function(e) {
  jQuery('#Usuario_cnpj').mask('99.999.999/9999-99',{placeholder:''});
  jQuery('#Usuario_cpf').mask('999.999.999-99',{placeholder:''});
  jQuery('#Usuario_telefone1').mask('(99)9999.9999?9',{placeholder:''});
  $("#Usuario_cep").mask('99999-999',{placeholder:''});

  $("#Usuario_cep").blur(function(e){
      if($("#Usuario_cep").val() != ""){    
          $("#Usuario_Usuario_endereco").val("...")
          $("#Usuario_bairro").val("...")
          $("#Usuario_cidade").val("...")
          $("#Usuario_estado").val("...")
           
          if($.trim($("#Usuario_cep").val()) != ""){
              $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#Usuario_cep").val(), function(){
                  if(resultadoCEP["logradouro"]){
                      $("#Usuario_endereco").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
                      $("#Usuario_bairro").val(unescape(resultadoCEP["bairro"]));
                      $("#Usuario_cidade").val(unescape(resultadoCEP["cidade"]));
                      $("#Usuario_estado").val(unescape(resultadoCEP["uf"]));
                      $("#Usuario_numero").focus();
                  }else{
                      alert("Não foi possivel encontrar o endereço");
                  }
              });
          }
      }
  });
});
</script>