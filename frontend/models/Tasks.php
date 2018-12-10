<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Tasks extends ActiveRecord
{
//    public $company_name;
//    public $position;
//    public $position_description;
//    public $salary;
//    public $date_start;
//    public $date_end;
//    public $date_publication;
//    public $email;

    public static function tableName()
    {
        return 'Tasks';
    }

    public function rules()
    {
        return [
            [['company_name', 'position', 'date_end'], 'required'],
            [['company_name'],'string', 'max' => 255],
            [['position'], 'string', 'max' => 255],
            [['position_description'], 'string', 'max' => 255],
            [['salary'], 'string', 'max' => 255],
            [['date_start'], 'date', 'format' => 'php:d-m-Y'],
            [['date_end'], 'date', 'format' => 'php:d-m-Y'],
            [['date_publication'], 'date', 'format' => 'php:d-m-Y'],

        ];
    }


}