<?php

/* @var $this yii\web\View */

$this->title = 'Books.QQ - лучший книжный архив!';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Здравствуйте!</h1>

        <p class="lead">Вы попали в самый маленький книжный архив Books.QQ</p>

        <img src="/img/1758503.jpg" alt="books.qq" style="max-width: 700px; max-height: 466px;">
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Книги</h2>

                <p>Полный перечень всех книг, поиск, подробности (авторы, год издания, жанр)</p>

                <p><a class="btn btn-default" href="/book/index">Книги &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Авторы</h2>

                <p>Список авторов, чьи книги представлены в хранилище. Поиск книг по авторам.</p>

                <p><a class="btn btn-default" href="/author/index">Авторы &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Жанры</h2>

                <p>Жанры, в которых были выпущены зарегистрированые книги. Поиск книг по жанрам.</p>

                <p><a class="btn btn-default" href="/genre/index">Жанры &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
