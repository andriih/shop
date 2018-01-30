<?php
namespace app\controllers;
use Yii;
use app\models\Category;
use app\models\Product;

class ProductController extends AppController
{
    public function actionView($id)
    {
        $product = Product::findOne($id);
        if(empty($product))  throw new \yii\web\HttpException(404, 'The requested Product could not be found.');
//        $product = Product::find()->with('category')
//                                  ->where(['id'=>$id])
//                                  ->limit(1)
//                                  ->one();
        $hits = Product::find()->where(['hit'=>'1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER | '.$product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product','hits'));
    }
}