<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Genre */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Жанры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genre-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->genre_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->genre_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что желаете удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'genre_id',
            'title',
        ],
    ]) ?>

</div>
