<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Author */
$this->title = "Редактировать данные автора: {$model->_fio}";
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->author_id, 'url' => ['view', 'id' => $model->author_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="author-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
