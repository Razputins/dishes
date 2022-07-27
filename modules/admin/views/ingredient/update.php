<?php

	use yii\helpers\Html;

	/* @var $this yii\web\View */
	/* @var $model app\models\Ingridient */

	$this->title = 'Обновить ингредиент: ' . $model->title;
	$this->params['breadcrumbs'][] = ['label' => 'ингредиенты', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="ingridient-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
