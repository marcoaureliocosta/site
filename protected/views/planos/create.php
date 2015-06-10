<?php
    /* @var $this PlanosController */
    /* @var $model Planos */
?>

<?php
$this->breadcrumbs=array(
	'Planoses'=>array('index'),
	'Create',
);

    $this->menu=array(
        array('icon' => 'glyphicon glyphicon-home','label'=>'Manage Planos', 'url'=>array('admin')),
    );
    ?>
<?php echo BSHtml::pageHeader('Create','Planos') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>