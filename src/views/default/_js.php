<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php if( $printTags ?? false ) : ?>
<script type='text/javascript'><?php endif; ?>
	
	<?php switch($section) : case 'onload' : ?>
	
	$( function () {} );
	
	<? break; case 'load nested' : ?>
	
	$( function () {
		
		$( '#nested-profile-address' ).load( '<?= Url::to( [
			'profile-address/index',
			\yozh\crud\controllers\DefaultController::PARAM_NESTED => true,
			$ProfileAddress->formName() => $ProfileAddress->getAttributes(),
		] ) ?>' );
		
	} );


    <?php break; case 'template' : ?>
	
	<?php break; default: ?>
	
	<?php endswitch; ?>
	<?php if( $printTags ?? false ) : ?></script><?php endif; ?>
