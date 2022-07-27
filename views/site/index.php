<?php

/** @var yii\web\View $this */

	use yii\bootstrap4\Html;

	$this->title = 'Главная';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Добро пожаловать!</h1>
    </div>

    <div class="body-content">
        <div class="row">
           <div class="col-md-12 main-crossroad">
			   <?= Html::a('Управление', ['/admin'], ['class' => 'btn btn-primary']); ?>
				   <span>--- ИЛИ ---</span>
			   <?= Html::a('Список блюд', ['/dish'], ['class' => 'btn btn-success']); ?>
           </div>
        </div>
    </div>
</div>
