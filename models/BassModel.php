<?php
/**
 * Created by PhpStorm.
 * User: gaoyuhong
 * Date: 2017/7/10
 * Time: 11:30
 */

namespace yii2\dingtalk\models;


use yii\base\Model;

class BassModel extends Model
{
    const URI = "https://oapi.dingtalk.com/robot/send?access_token=";
    public $token;
}