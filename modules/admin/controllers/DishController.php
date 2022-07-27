<?php

namespace app\modules\admin\controllers;

use app\models\dish\Dish;
use app\models\dish\DishSearch;
use app\models\DishToIngredient;
use app\models\ingredient\Ingredient;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DishController implements the CRUD actions for Dish model.
 */
class DishController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Dish models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DishSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dish model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Dish model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Dish();

		$ingredients_list = Ingredient::find()->select(['id', 'title'])->asArray()->all();
		$ingredients_list = ArrayHelper::map($ingredients_list, 'id', 'title');
		$ingredients_in = [];

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
				if(!empty($this->request->post('ingredients'))){
					foreach ($this->request->post('ingredients') as $ingredient){
						$new_ingredient = new DishToIngredient();
						$new_ingredient->dish_id = $model->id;
						$new_ingredient->ingredient_id = $ingredient;
						$new_ingredient->save();
					}
				}

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'ingredients_list' => $ingredients_list,
			'ingredients_in' => $ingredients_in,
        ]);
    }

    /**
     * Updates an existing Dish model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		$ingredients_list = Ingredient::find()->select(['id', 'title'])->asArray()->all();
		$ingredients_list = ArrayHelper::map($ingredients_list, 'id', 'title');
		$ingredients_in = DishToIngredient::find()->select(['id','ingredient_id'])->where(['dish_id' => $id])->asArray()->all();
		$ingredients_in = ArrayHelper::map($ingredients_in, 'id', 'ingredient_id');

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
			DishToIngredient::deleteAll(['dish_id' => $model->id]);
			foreach ($this->request->post('ingredients') as $ingredient){
				$new_ingredient = new DishToIngredient();
				$new_ingredient->dish_id = $model->id;
				$new_ingredient->ingredient_id = $ingredient;
				$new_ingredient->save();
			}
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'ingredients_list' => $ingredients_list,
            'ingredients_in' => $ingredients_in,
        ]);
    }

    /**
     * Deletes an existing Dish model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dish model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Dish the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dish::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
