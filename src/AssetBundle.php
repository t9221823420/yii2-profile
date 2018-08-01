<?php

namespace yozh\profile;

class AssetBundle extends \yozh\base\AssetBundle
{

    public $sourcePath = __DIR__ .'/../assets/';

    public $css = [
        //'css/yozh-profile.css',
	    //['css/yozh-profile.print.css', 'media' => 'print'],
    ];
	
    public $js = [
        //'js/yozh-profile.js'
    ];
	
    public $depends = [
        //'yii\bootstrap\BootstrapAsset',
    ];	
	
	public $publishOptions = [
		//'forceCopy'       => true,
	];
	
}