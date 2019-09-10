<?php
namespace frontend\controllers;

use frontend\models\form\ProductForm;
use frontend\models\Product;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $model = new ProductForm();
        $model->product = new Product;
        $model->product->loadDefaultValues();
        $model->setAttributes(Yii::$app->request->post());
        
        if (Yii::$app->request->post() && $model->save()) {
            Yii::$app->getSession()->setFlash('success', 'Product has been created.');
            return $this->redirect(['update', 'id' => $model->product->id]);
        }
        return $this->render('create', ['model' => $model]);
    }
    
    public function actionUpdate($id)
    {
        $model = new ProductForm();
        $model->product = $this->findModel($id);
        $model->setAttributes(Yii::$app->request->post());
        
        if (Yii::$app->request->post() && $model->save()) {
            Yii::$app->getSession()->setFlash('success', 'Product has been updated.');
            return $this->redirect(['update', 'id' => $model->product->id]);
        }
        return $this->render('update', ['model' => $model]);
    }
    
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }
        throw new HttpException(404, 'The requested page does not exist.');
    }
}