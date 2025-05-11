// product-controller-api.php
<?php
namespace api\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;

class ProductController extends ActiveController
{
    public $modelClass = 'app\models\Product';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'except' => ['options', 'search']
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete']);
        return $actions;
    }

    public function actionSearch($q)
    {
        return \app\models\Product::find()
            ->where(['like', 'name', $q])
            ->all();
    }
}