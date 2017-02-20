<?php

namespace frontend\controllers;

use Yii;
use common\models\Catalog;
use yii\web\Controller;
use yii\helpers\Json;

class CatalogController extends Controller {
    /**
     * @return mixed
     */
    public function actionSearch() {
        return Json::encode((new Catalog())->search(Yii::$app->request->post()));
    }
}
