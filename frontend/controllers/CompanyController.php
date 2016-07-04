<?php
/**
 * Created by PhpStorm.
 * User: Astana Creative
 * Date: 30.06.2016
 * Time: 13:03
 */

namespace frontend\controllers;
use yii\rest\ActiveController;

class CompanyController extends ActiveController
{
    public $modelClass = 'common\models\Company';
}