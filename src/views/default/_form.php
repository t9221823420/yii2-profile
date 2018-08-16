<?php

use powerkernel\tinymce\TinyMce;
use yii\helpers\Html;
use yozh\form\ActiveForm;
use yozh\helpdesk\models\HelpdeskAccount;
use yii\widgets\Pjax;
use yozh\widget\widgets\Modal;
use yozh\widget\widgets\ActiveButton;

/* @var $this yii\web\View */
/* @var $Model common\models\InvestPlan */
/* @var $form yii\widgets\ActiveForm */

$attributes = $Model->attributes;

?>

    <div class="firm-form">
		
		<?php $form = ActiveForm::begin(); ?>
		
		<?php $fields = $form->fields( $Model
			, $Model->attributesEditList()
		//, [ 'print' => false, ]
		);
		
		/*
		$fields['email_signature'] = $form->field( $Model, 'email_signature' )->baseWidget( \yozh\form\ActiveField::WIDGET_TYPE_TEXTAREA );
		
		
		foreach( $fields as $field ) {
			print $field;
		}
		*/
		?>

        <div class="form-group">
			<?= Html::submitButton( Yii::t( 'app', 'Save' ), [ 'class' => 'btn btn-success' ] ) ?>
        </div>
		
		
		<?php ActiveForm::end(); ?>

    </div>

<?php if( !$Model->isNewRecord ): ?>

    <div class="">

        <h3><?= Yii::t( 'app', 'Addreses' ) ?></h3>

        <div id="nested-profile-address" class=""><?= Yii::t( 'app', 'Loading' ) ?>
            <div class="yozh-spinner"></div>
        </div>

    </div>

    <div class="">

        <h3><?= Yii::t( 'app', 'Contacts' ) ?></h3>

        <div id="nested-profile-contact" class=""><?= Yii::t( 'app', 'Loading' ) ?>
            <div class="yozh-spinner"></div>
        </div>

    </div>
	
	<?php $this->registerJs( $this->render( '_js.php', [
		'section'        => 'load nested',
		'ProfileAddress' => $ProfileAddress,
	] ), $this::POS_END ); ?>

<?php endif; ?>