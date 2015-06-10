<?php
    /* @var $this UsuarioController */
    /* @var $model Usuario */
?>

<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);

    $this->menu=array(
        array('icon' => 'glyphicon glyphicon-home','label'=>'Manage Usuario', 'url'=>array('admin')),
    );
    ?>
<?php echo BSHtml::pageHeader('Create','Usuario') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>