<?php
/**
 * Created by PhpStorm.
 * User: bw_dev
 * Date: 30.05.2018
 * Time: 17:09
 */

use yozh\widget\widgets\Modal;
use yozh\widget\widgets\ActiveButton;
use yii\widgets\Pjax;
use yii\grid\GridView;
use kartik\helpers\Html;
use yii\helpers\Url;
use yozh\base\components\helpers\ArrayHelper;


// $path = $this->context->module->getParentPath( 'views' . DIRECTORY_SEPARATOR . $this->context->id ) . DIRECTORY_SEPARATOR . basename( __FILE__ );

include __DIR__ . '/_header.php';

$_params_['columns']['_actions']['buttons']['update'] = function( $url, $Model ) {
	return Html::a( '<span class="glyphicon glyphicon-pencil"></span>', Url::to( [ 'update', 'id' => $Model->id ] ), [
		'title'  => Yii::t( 'app', 'Update' ),
		'data-pjax' => 0,
	] );
};

/** @var \yii\web\View $this */
print $this->render( $parentViewPath . '/index', $_params_ );