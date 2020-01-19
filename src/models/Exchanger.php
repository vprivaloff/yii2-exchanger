<?php

namespace vprivaloff\exchanger\models;
use Yii;
use yii\db\ActiveRecord;

class Exchanger extends ActiveRecord{
    public function rules()
    {
        return [
            [['key'], 'default'],
            [['currency'], 'default'],
        ];
    }
}