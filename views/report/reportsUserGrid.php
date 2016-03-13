<?php
/**
 * Created by PhpStorm.
 * User: cs_ab_000
 * Date: 11/03/2016
 * Time: 12:36 PM
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Reports based on Request by User');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="reports-requestuser-index">
    <div id="gridView">
        <?= GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'pjax'=>true,
            'columns' => [
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'width' => '30px',
                ],
                [

                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'User',
                    'value'=>'name'
                ],
                [

                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'Count',
                    'value'=>'cnt'
                ],
            ],
            'toolbar'=> [

            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'default',
                'heading' => '<h4><i class="glyphicon glyphicon-list"></i> Requests Generated By User</h4>',
            ]
        ]) ?>
    </div>
</div>
