<?php

/**
 * Created by PhpStorm.
 * User: gaoyuhong
 * Date: 2017/7/10
 * Time: 11:25
 */
namespace notifier\dingtalk\models;
use yii\base\Model;

class TextMessage extends BassModel
{
    public $content;
    public $notice_users = [];
    public $at_all = false;
    public function rules()
    {
        return [
            ['content','string','maxlength'=>200,'message'=>'信息内容最大为200字'],
            ['content','required','message'=>'信息内容不能为空'],
            [['notice_users','at_all'],'safe']
        ];
    }
    public function attributeLabels()
    {
        return [
            'content'=>'信息内容',
            'at_all'=>'是否通知所有人',
            'notice_users'=>'要通知的用户'
        ];
    }
    public function send()
    {
        $template = [
            "msgtype"=>"text",
            "text"=>[
                "content"=>$this->content
            ],
            "at"=>[
                "atMobiles"=>$this->notice_users
            ],
            "isAtAll"=>$this->at_all
        ];
        $this->_send(parent::URI.$this->token,$template);
    }
}