<?php

/**
 * Created by PhpStorm.
 * User: bw_dev
 * Date: 13.08.2018
 * Time: 7:42
 */

use yozh\base\components\db\Migration;
use yozh\base\components\db\Schema;
use yozh\base\components\helpers\ArrayHelper;
use yozh\profile\models\Profile;

class m000000_000001_yozh_profile_table_dev extends Migration
{
	protected static $_table = '{{%yozh_profile}}';
	
	public function safeUp( $params = [] )
	{
		
		parent::safeUp([
			'mode' => 1 ? static::ALTER_MODE_UPDATE : static::ALTER_MODE_IGNORE,
		]);
		
	}
	
	public function getColumns( $columns = [] )
	{
		return parent::getColumns( [
			
			'user_id' => $this->integer()->notNull(),
			
			'title' => $this->enum( Profile::TYPE_TITLE )->notNull(),
			'gender' => $this->enum( Profile::TYPE_GENDER )->notNull(),
			
			'first_name'  => $this->string(),
			'middle_name'  => $this->string(),
			'second_name'  => $this->string(),
			
			'birthday'  => $this->dateTime()->notNull(),
		] );
	}
	
	public function getReferences( $references = [] )
	{
		return ArrayHelper::merge( [
			
			
			[
				'refTable'   => \common\models\User::getRawTableName(),
				'refColumns' => 'id',
				'columns'    => 'user_id',
				//'onDelete'   => self::CONSTRAINTS_ACTION_RESTRICT,
			],
			
			
		], $references );
	}

}