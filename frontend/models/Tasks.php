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
    public $email;
//    public $today;
    public $formCategory;



    public static function tableName()
    {
        return 'Tasks';
    }

    public function rules()
    {

        return [
            [['company_name', 'position', 'date_end'], 'required', 'message' => 'Заполните это поле'],
            [['company_name'],'string', 'max' => 255],
            [['position'], 'string', 'max' => 255],
            [['position_description'], 'string', 'max' => 255],
            [['salary'], 'integer', 'max' => 999999],
            [['date_start'], 'date', 'format' => 'php:d-m-Y'],
            [['date_end'], 'date', 'format' => 'php:d-m-Y'],
            [['date_publication'], 'date', 'format' => 'php:d-m-Y'],
        ];
    }

    public function validateDate()
    {
        $today = date("d-m-Y");
        return $today;
    }

    public function contact($email)
    {
        $request = Yii::$app->request;
        $company_name = $request->post('company_name');
        if ($this->validate()) {

            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom('Test@mail.local')
                ->setSubject('Task')
                ->setTextBody($company_name)
                ->send();

            return true;
        }
        return false;
    }

}