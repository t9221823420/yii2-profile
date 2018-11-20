<?php
/**
 * Created by PhpStorm.
 * User: bw_dev
 * Date: 24.06.2018
 * Time: 11:43
 */

namespace yozh\profile\actions\profile;

use yozh\helpdesk\models\HelpdeskAccount;
use yozh\profile\models\ProfileAddress;
use yozh\ysell\models\AccountRuleSearch;
use yozh\ysell\models\vat\CountryVatRuleSearch;
use yozh\ysell\models\firm\FirmCountryAccountSearch;
use yozh\base\models\BaseActiveRecord as ActiveRecord;
use yozh\ysell\models\SaleschannelHelpdeskLinkSearch;

class UpdateAction extends \yozh\base\actions\UpdateAction
{
	
	public function process( ActiveRecord $Model = null, bool $clone = false )
	{
		$result = parent::process( $Model, $clone );
		
		if( is_array( $result ) ) {
			
			extract( $result );
			
			$ProfileAddress = new ProfileAddress( [
				'profile_id' => $Model->id,
			] );
			
			return [
				'Model'          => $Model,
				'ProfileAddress' => $ProfileAddress,
			];
			
		}
		else if( $result ) {
			return $result;
		}
		
	}
	
}