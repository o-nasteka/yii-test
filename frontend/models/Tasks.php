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
//        $company_name = $request->post('company_name');
        $tasks = $request->post('Tasks');

        $company_name = $tasks['company_name'];
        $position = $tasks['position'];
        $position_description = $tasks['position_description'];
        $salary = $tasks['salary'];
        $date_start = $tasks['date_start'];
        $date_end = $tasks['date_end'];
        $date_publication = $tasks['date_publication'];

        $msg = "Company name: $company_name  
               Position:  $position
               Position description: $position_description 
               Salary: $salary
               Data Start: $date_start  
               Data End: $date_end
               Data Publication: $date_publication  
        ";

        if ($this->validate()) {

            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom('Test@mail.local')
                ->setSubject('Task')
                ->setHtmlBody($msg)
                ->send();

            return true;
        }
        return false;
    }

}