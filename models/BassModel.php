<?php
/**
 * Created by PhpStorm.
 * User: gaoyuhong
 * Date: 2017/7/10
 * Time: 11:30
 */

namespace notifier\dingtalk\models;


use yii\base\Model;

class BassModel extends Model
{
    const URI = "https://oapi.dingtalk.com/robot/send?access_token=";
    public $token;
    public function rules()
    {
        return [
            ['token','required','message'=>'群组令牌不能为空']
        ];
    }
    public function _send($url,$data)
    {
        $res = \Requests::post($url,[
            'Content-Type'=>'application/json;charset=utf-8',
        ],json_encode($data));
        if($res->status_code==200)
        {
            $response = json_decode($res->body);
            if($response->errcode!=0)
            {
                throw new \Exception($response->errmsg,$response->errcode);
            }
        }
    }
}