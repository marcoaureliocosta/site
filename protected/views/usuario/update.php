<?php
    /* @var $this UsuarioController */
    /* @var $model Usuario */
?>

<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->idusuario=>array('view','id'=>$model->idusuario),
	'Update',
);

    $this->menu=array(
    array('icon' => 'glyphicon glyphicon-home','label'=>'Manage Usuario', 'url'=>array('admin')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Usuario', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idusuario),'confirm'=>'Are you sure you want to delete this item?')),
    );
    ?>
<?php echo BSHtml::pageHeader('Update','Usuario '.$model->idusuario) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>