<?php

	use yii\bootstrap4\Html;

	$this->title = 'Управление';
?>
<div class="site-index">

	<div class="jumbotron text-center bg-transparent">
		<h1 class="display-4">Выберите!</h1>
	</div>

	<div class="body-content">
		<div class="row">
			<div class="col-md-12 main-crossroad">
				<?= Html::a('Ингредиенты', ['/admin/ingredient'], ['class' => 'btn btn-primary']); ?>
				<span>--- ИЛИ ---</span>
				<?= Html::a('Блюда', ['/admin/dish'], ['class' => 'btn btn-success']); ?>
			</div>
		</div>
	</div>
</div>