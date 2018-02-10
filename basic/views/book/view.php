<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->book_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->book_id], [
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
            //'book_id',
            //'genre_id',
            'title',
            [
                'attribute' => 'authors',
                'format' => 'html',
                'value' => function($data) {
                    $result = '';
                    foreach ($data->authors as $author) {
                        if (!empty($result)) $result .= ', ';
                        $result .= $author->_fio;
                    }
                    return $result;
                }
            ],
            'year',
            'genre',
            [
                'attribute' => 'picture',
                'format' => 'html',
                'value' => function($data) {
                    $filename = Yii::getAlias('@webroot') . '/uploads/' . $data->picture;
                    if (file_exists($filename) && !is_dir($filename))
                        return '<img class="book-minipic" src="' . Yii::getAlias('@web') . '/uploads/' . $data->picture . '">';
                    else
                        return '';
                }
            ],
        ],
    ]) ?>

</div>
