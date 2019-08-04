<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Videogallery */

$this->title = 'Create Videogallery';
$this->params['breadcrumbs'][] = ['label' => 'Videogalleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videogallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
