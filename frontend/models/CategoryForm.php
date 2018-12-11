<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class CategoryForm extends ActiveRecord
{
    public $name;
    public $parrent;

    public function rules()
    {
        return [
            [['name', 'parrent'], 'required'],
            [['name', 'parrent'], 'trim'],
        ];
    }
}