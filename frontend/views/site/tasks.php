<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;

$this->title = 'Tasks Form';
?>

    <h1><?= Html::encode($this->title) ?></h1>

<div id="message-bl" style="display: none;">
<?php// if (Yii::$app->session->hasFlash('taskFormSubmitted')): ?>
    <div class="row">

        <div class="col-lg-5">

            <div class="panel panel-default">

                <div class="panel-heading">Message Sent</div>

                <div class="panel-body">
                    <?php // var_dump($model); ?>

                    <ul>
                        <li><label>Название компании</label>: </li>
                        <li><label>Должность</label>: <?= Html::encode($model->position) ?></li>
                        <li><label>Описание должности</label>: <?= Html::encode($model->position_description) ?></li>
                        <li><label>Размер з/п</label>: <?= Html::encode($model->salary) ?></li>
                        <li><label>Дата начала</label>: <?= Html::encode($model->date_start) ?></li>
                        <li><label>Дата окончания</label>: <?= Html::encode($model->date_end) ?></li>
                        <li><label>Дата размещения</label>: <?= Html::encode($model->date_publication) ?></li>
                    </ul>

                </div>

            </div>

            <div class="alert alert-success">

                Your task is added!

            </div>


            <?= Html::a('Back', ['/site/tasks'], ['class'=>'btn btn-primary']) ?>

        </div>

    </div>
</div>
<?php // else: ?>

<!-- -->

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, "formCategory")->dropDownList([
                    1 => 'form1',
                    2 => 'form2'
                ],
            [
                    'class'=>'form-control',
                'prompt'=>'Please Select',
                'required'=>true
            ])->label('Выберите форму')
    ?>

   
    <?php ActiveForm::end(); ?>

    <!-- -->

    <div id="form1" hidden>
        <h3>form1</h3>
<!-- form1 -->
        <?php $form = ActiveForm::begin([
            'id' => 'form-input1'
//            'options' => [
//                'onsubmit' => 'sendAjax(this, taskAction)'
//            ],
        ]); ?>

        <?= $form->field($model, 'company_name') ?>

        <?= $form->field($model, 'position') ?>

        <?= $form->field($model, 'position_description') ?>

        <?= $form->field($model, 'salary') ?>


        <?= $form->field($model, 'date_start')
            ->textInput(['autocomplete' => 'off',])
            ->widget(\yii\jui\DatePicker::class,
                [
                    'language' => 'ru',
                    'dateFormat' => 'dd-MM-yyyy',


        ]) ?>

        <?= $form->field($model, 'date_end')
            ->textInput(['autocomplete' => 'off'])
            ->widget(\yii\jui\DatePicker::class, [
            'language' => 'ru',
            'dateFormat' => 'dd-MM-yyyy',
        ]) ?>

        <?= $form->field($model, 'date_publication')
            ->textInput(['autocomplete' => 'off', 'disabled'])
            ->widget(\yii\jui\DatePicker::class, [
            'language' => 'ru',
            'dateFormat' => 'dd-MM-yyyy',
        ]) ?>


        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
</div>
<!-- form1 end -->

<!-- form2 -->
<div id="form2" hidden>
    <h3>form2</h3>
</div>
<!-- form2 end -->


<?php // endif; ?>

<!-- Modal -->
<?php
Modal::begin([

]);

echo "<div class='messages'>
    Ваше задание успешно размещено!
</div>";

Modal::end();

?>
