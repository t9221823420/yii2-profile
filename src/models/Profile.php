<?php
/**
 * Created by PhpStorm.
 * User: bw_dev
 * Date: 13.08.2018
 * Time: 7:33
 */

namespace yozh\profile\models;

use Yii;
use common\models\User;
use yozh\crud\models\BaseModel as ActiveRecord;

class Profile extends ActiveRecord
{
	const TYPE_TITLE = [
		'Mr',
		'Mrs',
		'Miss',
		'Ms',
		'Dr',
	];
	
	const TYPE_GENDER = [
		'male',
		'female',
	];
	
	public static function tableName()
	{
		return '{{%yozh_profile}}';
	}
	
	public function rules()
	{
		return [
			[ [ 'user_id', 'first_name', 'second_name', 'title', 'gender', 'birthday', ], 'required', 'except' => static::SCENARIO_FILTER  ],
			
			// integer
			[ [ 'user_id', ], 'integer' ],
			[ [ 'user_id', ], 'compare', 'operator' => '>', 'compareValue' => 0 ],
			
			[ [ 'first_name', 'middle_name', 'second_name', ], 'string', 'max' => 255 ],
			[ [ 'first_name', 'middle_name', 'second_name', ], 'filter', 'filter' => 'trim' ],
			[ [ 'first_name', 'middle_name', 'second_name', ], 'filter', 'filter' => '\yii\helpers\HtmlPurifier::process' ],
			
			[ [ 'title' ], 'in', 'range' => static::TYPE_TITLE, 'allowArray' => true ],
			[ [ 'gender' ], 'in', 'range' => static::TYPE_GENDER, 'allowArray' => true ],
			
			[ [ 'birthday', ], 'filter', 'filter' => function( $value ) {
				return Yii::$app->formatter->asDatetime( $value, 'php:Y-m-d' );
			} ],
			
			[ [ 'user_id' ],
				'unique',
				'message'         => Yii::t( 'app', 'Selected User already has Profile' ),
			],
			
			[ [ 'user_id' ],
				'exist',
				'skipOnError'     => true,
				'targetClass'     => User::class,
				'targetAttribute' => [ 'user_id' => 'id' ],
			],
			
		];
	}

}