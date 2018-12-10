<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui;

$this->title = 'Tasks Form';
?>

    <h1><?= Html::encode($this->title) ?></h1>

<?php if (Yii::$app->session->hasFlash('taskFormSubmitted')): ?>
    <div class="row">

        <div class="col-lg-5">

            <div class="panel panel-default">

                <div class="panel-heading">Message Sent</div>

                <div class="panel-body">

                    <ul>
                        <li><label>Название компании</label>: <?= Html::encode($model->company_name) ?></li>
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

<?php else: ?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'company_name') ?>

<?= $form->field($model, 'position') ?>

<?= $form->field($model, 'position_description') ?>

<?= $form->field($model, 'salary') ?>


<?= $form->field($model, 'date_start')->widget(\yii\jui\DatePicker::class, [
    'language' => 'ru',
    'dateFormat' => 'dd-MM-yyyy',
]) ?>

<?= $form->field($model, 'date_end')->widget(\yii\jui\DatePicker::class, [
    'language' => 'ru',
    'dateFormat' => 'dd-MM-yyyy',
]) ?>

<?= $form->field($model, 'date_publication')->widget(\yii\jui\DatePicker::class, [
    'language' => 'ru',
    'dateFormat' => 'dd-MM-yyyy',
]) ?>



    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

<?php endif; ?>
