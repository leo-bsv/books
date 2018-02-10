<?php

namespace app\controllers;

use Codeception\Module\Yii2;
use Yii;
use app\models\Book;
use app\models\Genre;
use app\models\Author;
use app\models\BookAuthor;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','update','delete'],
                'rules' => [
                    [
                        'actions' => ['create','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Book::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();
        $genre_list = ArrayHelper::map(Genre::find()->all(), 'genre_id', 'title');
        $author_list = ArrayHelper::map(Author::find()->orderBy('last_name')->all(), 'author_id', '_fio');

        if ($model->load(app()->request->post()) && $model->save()) {
            $book = app()->request->post('Book');

            // добавим актуальных авторов книги
            foreach ($book['authors'] as $author_id) {
                $author = Author::findOne($author_id);
                $model->link('authors', $author);
            }

            return $this->redirect(['view', 'id' => $model->book_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'genre_list' => $genre_list,
            'author_list' => $author_list,
        ]);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $genre_list = ArrayHelper::map(Genre::find()->all(), 'genre_id', 'title');
        $author_list = ArrayHelper::map(Author::find()->orderBy('last_name')->all(), 'author_id', '_fio');

        if ($model->load(app()->request->post()) && $model->save()) {

            $book = app()->request->post('Book');
            // удалим предыдущие связи с таблицей авторов
            BookAuthor::deleteAll(['book_id' => $id]);

            // добавим актуальных авторов книги
            foreach ($book['authors'] as $author_id) {
                $author = Author::findOne($author_id);
                $model->link('authors', $author);
            }

            return $this->redirect(['view', 'id' => $model->book_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'genre_list' => $genre_list,
            'author_list' => $author_list,
        ]);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
