<?php

namespace yozh\profile;

use yozh\base\Module as BaseModule;

class Module extends BaseModule
{

	const MODULE_ID = 'profile';
	
	public $controllerNamespace = 'yozh\\' . self::MODULE_ID . '\controllers';
	
}
