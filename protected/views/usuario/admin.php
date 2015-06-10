<?php
/*$this->menu=array(
array('icon' => 'glyphicon glyphicon-home','label'=>'Manage Usuario', 'url'=>array('admin')),
array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Usuario', 'url'=>array('create')),
);*/
$this->pageTitle = 'Configurações > Usuários';

?>
<!-- BEGIN PAGE HEAD -->
<div class="page-head">
	<!-- BEGIN PAGE TITLE -->
	<div class="page-title">
	  <h1>Usuários</h1>
	</div>
	<!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD -->

<!-- BEGIN PAGE CONTENT INNER -->
<div class="row">
	<div class="col-md-12">
      <button class="btn green btnCreateUsuario pull-right" type="button"> Novo &nbsp; <i class="icon-plus m-icon-white"></i></button>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<br>
		<div class="portlet light">
        <?php $this->widget('bootstrap.widgets.BsGridView',array(
	        'id'=>'usuario-grid',
	        'dataProvider'=>$model->search(),
	        'filter'=>$model,
	        'htmlOptions'=>array('class'=>"table-light"),
	        'rowCssClassExpression'=>'$data->usuario_idempresa > 0 ? "" : "warning"',
	        'columns'=>array(
	        	//'idusuario',
	        	array(
	        		'name'=>'nome',
	        		'value'=>'CHtml::Link($data->nome,$data->idusuario,array("class"=>"btnViewUsuario"))',
	        		'type'=>'html'
	        	),
	        	'email',
	        	array(
	        		'name'=>'status',
	        		'value'=>'$data->status == 2 ? $data->txtStatus." - ".CHtml::link("Renviar convite <i class=\"fa fa-refresh\"></i>",$data->idusuario,array("class"=>"btnResent")) : $data->txtStatus',
	        		'type'=>'html',
	        		'filter'=>$model->getArrayStatus()
	        	),
		        array(
		        	'class'=>'bootstrap.widgets.BsButtonColumn',
		        	'template'=>'{update}{updateStatus}{delete}',
		        	'buttons'=>array(
		        		'delete'=>array(
		        			'visible'=>'$data->usuario_idempresa == Usuario::getIDUsuario() && $data->status !=3 ? true : false',//o usuário 'principal' é sempre 0. Ele quem adiciona outros dependentes, logo, nao pode ser excluído nem desativado.
		        		),
		        		'updateStatus'=>array(
		        			'label'=>'ativar/desativer',
		        			'url'=>'Yii::app()->controller->createUrl("usuario/ajaxUpdateStatus",array("id"=>$data->idusuario))',
		        			'icon' =>$model->status == 0 || $model->status == 3 ? "glyphicon-ok" : "glyphicon-remove",
		        			'visible'=>'$data->usuario_idempresa == Usuario::getIDUsuario() && $data->status !=2 ? true : false',//o usuário 'principal' é sempre 0. Ele quem adiciona outros dependentes, logo, nao pode ser excluído nem desativado.
		        			'options'=>array('class'=>"ajaxUpdateStatus"),
		        			
		        		),
		        		'update'=>array(
		        			'url'=>'Yii::app()->controller->createUrl("usuario/ajaxUpdate",array("id"=>$data->idusuario))',
		        			'click'=>'function(){
								url = $(this).attr("href");
								$("#defaultModal").modal("show");
								$("#defaultModal .modal-title").html("Editar Dados do Usuário");
								$("#defaultModal .modal-body").load(url);
								return false;
							}',
		        			'visible'=>'$data->status !=2 && $data->status !=3 && $data->idusuario == Usuario::getIDUsuario() ? true : false',
		        		)
		        	)
		        ),
	        ),
        )); ?>
    	</div>
    	<span class="label label-warning">Usuário Principal</span> <span class="label label-default">Dependentes</span>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('.btnViewUsuario').live('click',function(){
			id = $(this).attr('href');
			$('#defaultModal').modal('show');
			$('#defaultModal .modal-title').html('Dados do Usuário');
			$('#defaultModal .modal-body').load( baseURL+'/usuario/ajaxView/'+id );
			return false;
		});

		$('.btnCreateUsuario').live('click',function(){
			$('#defaultModal').modal('show');
			$('#defaultModal .modal-title').html('Novo Usuário');
			$('#defaultModal .modal-body').load( baseURL+'/usuario/ajaxCreate/');
			return false;
		});

		$('.ajaxUpdateStatus').live('click',function(){
			c = confirm('Deseja realmente alterar o status desse usuário?');
			if(c){
				$.ajax({
		            type: "POST",
		            url: $(this).attr('href'),
		            data:'status=1',
		            dataType: 'json',
		            success:function(data){
		                if(data.resp){
		                	 alert(data.resp);
		                    $.fn.yiiGridView.update('usuario-grid');
		                   return false; 
		                }
		            },
		            error:function(data){
		            	alert('Error');
		            }
		        });
		        return false; 
			}
			return false;
		});

		//Renviar convite, na coluna de 'status'
		$('.btnResent').live('click',function(){
			c = confirm('Deseja realmente reenviar o convite?');
			if(c){
				id = $(this).attr('href');
				$.ajax({
		            type: "POST",
		            url: baseURL+'/usuario/ajaxReenviarConvite',
		            data:'id='+id,
		            dataType: 'json',
		            success:function(data){
		                if(data.resp){
		                	alert(data.resp);
		                    //$.fn.yiiGridView.update('usuario-grid');
		                   	return false; 
		                }
		            },
		            error:function(data){
		            	alert('Error');
		            }
		        });
		        return false; 
			}
			return false;
		});


	});
</script>




