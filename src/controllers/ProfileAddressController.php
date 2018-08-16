<?php

namespace yozh\profile\controllers;

use yozh\crud\controllers\DefaultController as Controller;
use yozh\profile\models\Profile;
use yozh\profile\models\ProfileAddress;

/**
 * Default controller for the `template` module
 */
class ProfileAddressController extends Controller
{
	
	public static function defaultModelClass()
	{
		return ProfileAddress::class;
	}
	
}
