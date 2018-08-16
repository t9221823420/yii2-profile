<?php

namespace yozh\profile\controllers;

use yozh\crud\controllers\DefaultController as Controller;
use yozh\profile\actions\profile\UpdateAction;
use yozh\profile\models\Profile;

/**
 * Default controller for the `template` module
 */
class DefaultController extends Controller
{
	
	public static function defaultModelClass()
	{
		return Profile::class;
	}
	
	public function actions()
	{
		return array_merge( parent::actions(), [
			
			'update' => [
				'class' => UpdateAction::class,
			],
		
		] );
	}
	
}
