<?php

namespace yozh\templatescrud\controllers;

use yozh\crud\controllers\DefaultController as Controller;

/**
 * Default controller for the `template` module
 */
class DefaultController extends Controller
{
	
	public static function defaultModelClass()
	{
		return BaseModel::class;
	}
	
}
