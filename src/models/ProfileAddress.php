<?php
/**
 * Created by PhpStorm.
 * User: bw_dev
 * Date: 13.08.2018
 * Time: 8:53
 */

namespace yozh\profile\models;

use Yii;
use yozh\address\models\Address;
use yozh\crud\models\BaseActiveRecord as ActiveRecord;

class ProfileAddress extends ActiveRecord
{
	public static function tableName()
	
	{
		return '{{%yozh_profile_address}}';
	}
	
	public function rules( $rules = [], $update = false )
	{
		static $_rules;
		
		if( !$_rules || $update ) {
			
			$_rules = parent::rules( \yozh\base\components\validators\Validator::merge( [
				
				[ [ 'profile_id', 'address_id', ], 'required', 'except' => static::SCENARIO_FILTER ],
				
				//[ [ 'notes', ], 'string', 'max' => 255 ],
				[ [ 'notes', ], 'filter', 'filter' => 'trim' ],
				[ [ 'notes', ], 'filter', 'filter' => '\yii\helpers\HtmlPurifier::process' ],
				
				[ [ 'profile_id' ],
					'exist',
					'skipOnError'     => true,
					'targetClass'     => Profile::class,
					'targetAttribute' => [ 'profile_id' => 'id' ],
				],
				
				[ [ 'address_id' ],
					'exist',
					'skipOnError'     => true,
					'targetClass'     => Address::class,
					'targetAttribute' => [ 'address_id' => 'id' ],
				],
			
			], $rules ) );
			
		}
		
		return $_rules;
		
	}
	
}