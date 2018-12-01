<?php

/**
 * Created by PhpStorm.
 * User: bw_dev
 * Date: 13.08.2018
 * Time: 8:48
 */

use yozh\base\components\db\Migration;
use yozh\base\components\db\Schema;
use yozh\base\components\helpers\ArrayHelper;
use yozh\profile\models\ProfileAddress;

class m000000_000000_020_yozh_profile_address_dev extends Migration
{
	protected static $_table;
	
	public function __construct( array $config = [] ) {
		
		static::$_table = static::$_table ?? ProfileAddress::getRawTableName();
		
		parent::__construct( $config );
		
	}
	
	public function safeUp( $params = [] )
	{
		
		parent::safeUp( $params);
		
	}
	
	public function getColumns( $columns = [] )
	{
		return parent::getColumns( [
			'profile_id' => $this->integer(),
			'address_id' => $this->integer(),
			
			'notes' => $this->text(),
		] );
	}
	
	public function getReferences( $references = [] )
	{
		return ArrayHelper::merge( [
			
			[
				'refTable'   => \yozh\profile\models\Profile::getRawTableName(),
				'refColumns' => 'id',
				'columns'    => 'profile_id',
				//'onDelete'   => self::CONSTRAINTS_ACTION_RESTRICT,
			],
		
			[
				'refTable'   => \yozh\address\models\Address::getRawTableName(),
				'refColumns' => 'id',
				'columns'    => 'address_id',
				//'onDelete'   => self::CONSTRAINTS_ACTION_RESTRICT,
			],
		
		], $references );
	}

}