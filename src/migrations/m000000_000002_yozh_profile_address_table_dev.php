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

class m000000_000002_yozh_profile_address_table_dev extends Migration
{

	protected static $_table = '{{%yozh_profile_address}}';
	
	public function safeUp( $params = [] )
	{
		
		parent::safeUp([
			'mode' => 1 ? static::ALTER_MODE_UPDATE : static::ALTER_MODE_IGNORE,
		]);
		
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