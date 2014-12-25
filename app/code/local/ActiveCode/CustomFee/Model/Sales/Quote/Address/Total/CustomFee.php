<?php

class ActiveCode_CustomFee_Model_Sales_Quote_Address_Total_CustomFee extends
Mage_Sales_Model_Quote_Address_Total_Abstract
{
	public function __construct()
	{
		$this->setCode('customfee');
	}
	
	public function collect(Mage_Sales_Model_Quote_Address $address)
	{
		$quote = $address->getQuote();
		if(!$quote->isVirtual() && $address->getAddressType() == 'biiling'){
			return $this;
		}
		
		$items = $address->getAllItems();
		/**
		 * create Fee 5$  for each item in cart
		 */
		$baseCheckTotal = count($items)*5;
		$checkTotal     = Mage::app()->getStore()->convertPrice($baseCheckTotal);
		/**
		 * view CustomFee
		 */
		$address->setBaseCheckTotal(+$baseCheckTotal);
		$address->setCheckTotal(+$checkTotal);
		/**
		 * update Grand Total
		 */
		
		$address->setBaseGrandTotal($address->getBaseGrandTotal()+$baseCheckTotal);
		$address->setGrandTotal($address->getGrandTotal()+$checkTotal);
		
		return $this;
	}
	
	/**
	 * gets customFee value calculated in collect(), then add total to object $address
	 * @see Mage_Sales_Model_Quote_Address_Total_Abstract::fetch()
	 */
	public function fetch(Mage_Sales_Model_Quote_Address $address){
		$amount = $address->getCheckTotal();
		$title  = Mage::helper('customfee')->__('CustomFee');
		
		if($amount != 0){
			$address->addTotal(array(
					'code'  => $this->getCode(),
					'title' => $title,
					'value' => $amount,
			));
		}
	}
}