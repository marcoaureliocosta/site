<?php
    /* @var $this PlanosController */
    /* @var $model Planos */
?>

<?php
$this->breadcrumbs=array(
	'Planoses'=>array('index'),
	$model->IDPlano=>array('view','id'=>$model->IDPlano),
	'Update',
);

    $this->menu=array(
    array('icon' => 'glyphicon glyphicon-home','label'=>'Manage Planos', 'url'=>array('admin')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Planos', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete Planos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDPlano),'confirm'=>'Are you sure you want to delete this item?')),
    );
    ?>
<?php echo BSHtml::pageHeader('Update','Planos '.$model->IDPlano) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>