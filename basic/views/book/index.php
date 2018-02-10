<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Новая книга', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
