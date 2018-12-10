<?php
use yii\helpers\Html;
?>
<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>Название компании</label>: <?= Html::encode($model->company_name) ?></li>
    <li><label>Должность</label>: <?= Html::encode($model->position) ?></li>
    <li><label>Описание должности</label>: <?= Html::encode($model->position_description) ?></li>
    <li><label>Размер з/п</label>: <?= Html::encode($model->salary) ?></li>
    <li><label>Дата начала</label>: <?= Html::encode($model->date_start) ?></li>
    <li><label>Дата окончания</label>: <?= Html::encode($model->date_end) ?></li>
    <li><label>Дата размещения</label>: <?= Html::encode($model->date_publication) ?></li>
</ul>

<?= Html::a('Back', ['/site/entry'], ['class'=>'btn btn-primary']) ?>
