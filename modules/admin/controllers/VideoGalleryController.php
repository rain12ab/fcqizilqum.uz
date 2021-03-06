<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Videogallery;
use app\modules\admin\models\VideogallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VideoGalleryController implements the CRUD actions for Videogallery model.
 */
class VideoGalleryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Videogallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideogallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Videogallery model.
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
     * Creates a new Videogallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Videogallery();

        if ($model->load(Yii::$app->request->post())) {
            if($model->type == 0){
                $model->url = str_replace('watch/', 'video/embed/', $model->url);
            }
            else if ($model->type == 1) {
                $model->url = str_replace('/watch?v=', '/embed/', $model->url);
            }
            else {
                Yii::$app->session->setFlash(\dominus77\sweetalert2\Alert::TYPE_ERROR, [
                    [
                        'title' => 'Xatolik yuz berdi',
                        'confirmButtonText' => 'Ok!',
                    ]
                ]);
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            $model->save();
            Yii::$app->session->setFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS, [
                [
                    'title' => 'Video saqlandi',
                    'confirmButtonText' => 'Ok!',
                ]
            ]);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Videogallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->type == 0){
                $model->url = str_replace('watch/', 'video/embed/', $model->url);
            }
            else if ($model->type == 1) {
                $model->url = str_replace('/watch?v=', '/embed/', $model->url);
            }
            else {
                Yii::$app->session->setFlash(\dominus77\sweetalert2\Alert::TYPE_ERROR, [
                    [
                        'title' => 'Xatolik yuz berdi',
                        'confirmButtonText' => 'Ok!',
                    ]
                ]);
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            $model->save();
            Yii::$app->session->setFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS, [
                [
                    'title' => 'Video saqlandi',
                    'confirmButtonText' => 'Ok!',
                ]
            ]);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Videogallery model.
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
     * Finds the Videogallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Videogallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Videogallery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
