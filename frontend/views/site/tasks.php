<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Button;
use yii\jui;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;

$this->title = 'Tasks Form';
?>

    <h1><?= Html::encode($this->title) ?></h1>


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
    <?php /*
    echo Button::widget([
            'id' => 'modal-btn',
            'label' => 'Action',
            'options' => [
                    'class' => 'btn btn-primary',
            ],
        ]);
    */
    ?>
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
            ->textInput(['autocomplete' => 'off'])
            ->widget(\yii\jui\DatePicker::class,
                ['language' => 'ru',
                    'dateFormat' => 'dd-MM-yyyy',])
        ?>

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


<!-- -->
<!-- -->
<!-- Modal -->
<?php
Modal::begin([
    'id' => 'modal-messages',
    'header' => '<h2>Задача отправлена!</h2>',
    'footer' => '
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>',
]);

echo '<div class="alert alert-warning">
    <strong>Отправлено на модерацию!</strong> <br> 
    Ваше задание отправлено и в ближайшее время будет размещено!
</div>';

Modal::end();

?>
