<?php
class ActiveCode_CustomFee_Block_Sales_Order_Totals_CustomFee extends
Mage_Core_Block_Abstract
{
	public function getCheckTotal()
	{
		$order = $this->getOrder();
		return $order->getCheckTotal();
	}
	
	public function getBaseCheckTotal()
	{
		$order = $this->getOrder();
		return $order = getBaseCheckTotal();
	}
	
	public function initTotals()
	{
		$amount = $this->getCheckTotal();
		if(floatval($amount)){
			$total  = new Varien_Object();
			$total  = setCode('customfee');
			$total  = setValue($amount);
			$total  = setBaseValue($this->getBaseCheckTotal());
			$total  = setLabel('CustomFee');
			$parent = $this->getParentBlock();
			$parent = addTotal($total,'subtotal');
		}
	}
	
	public function getOrder()
	{
		if(!$this->hasData('order')){
			$order = $this->getParentBlock()->getOrder();
			$this->setData('order', $order);
		}
		
		return $this->getData('order');
	}
}