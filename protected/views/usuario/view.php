<style type="text/css">
	.table > tbody > tr > th{
	    border-top: none !important;
	}
</style>
<?php $this->widget('bootstrap.widgets.BsDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-hover table-condensed table-light',
	),
	'data'=>$model,
	'attributes'=>array(
			'nome',
			'email',
			'telefone1',
			'telefone3',
			array(
	    		'name'=>'status',
	    		'value'=>$model->txtStatus,
	    		'type'=>'html'
	    	),
	),
)); ?>