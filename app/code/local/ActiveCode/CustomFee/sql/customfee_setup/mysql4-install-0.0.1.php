<?php

$installer = $this;
$installer->startSetup();
$installer->run("
		
		ALTER TABLE {$this->getTable('sales/order')}
		ADD COLUMN `checktotal_amount` decimal (12,4) NOT NULL  default '0',
		ADD COLUMN `base_checktotal_amount` decimal (12,4) NOT NULL  default '0';
		
		ALTER TABLE {$this->getTable('sales/quote_item')}
		ADD COLUMN `checktotal_amount` decimal (12,4) NOT NULL  default '0',
		ADD COLUMN `base_checktotal_amount` decimal (12,4) NOT NULL  default '0';
		
		ALTER TABLE {$this->getTable('sales/quote_address_item')}
		ADD COLUMN `checktotal_amount` decimal (12,4) NOT NULL  default '0',
		ADD COLUMN `base_checktotal_amount` decimal (12,4) NOT NULL  default '0';
		
		ALTER TABLE {$this->getTable('sales/quote_address')}
		ADD COLUMN `checktotal_amount` decimal (12,4) NOT NULL  default '0',
		ADD COLUMN `base_checktotal_amount` decimal (12,4) NOT NULL  default '0';
		
		ALTER TABLE {$this->getTable('sales/order_item')}
		ADD COLUMN `checktotal_amount` decimal (12,4) NOT NULL  default '0',
		ADD COLUMN `base_checktotal_amount` decimal (12,4) NOT NULL  default '0';
			
		ALTER TABLE {$this->getTable('sales/invoice')}
		ADD COLUMN `checktotal_amount` decimal (12,4) NOT NULL  default '0',
		ADD COLUMN `base_checktotal_amount` decimal (12,4) NOT NULL  default '0';
		
		ALTER TABLE {$this->getTable('sales/creditmemo')}
		ADD COLUMN `checktotal_amount` decimal (12,4) NOT NULL  default '0',
		ADD COLUMN `base_checktotal_amount` decimal (12,4) NOT NULL  default '0';
		
		ALTER TABLE {$this->getTable('sales/invoice_item')}
		ADD COLUMN `checktotal_amount` decimal (12,4) NOT NULL  default '0',
		ADD COLUMN `base_checktotal_amount` decimal (12,4) NOT NULL  default '0';
		
		ALTER TABLE {$this->getTable('sales/creditmemo_item')}
		ADD COLUMN `base_custom_orderfee_amount` decimal (12,4) default NULL,
		ADD COLUMN `custom_orderfee_amount` decimal (12,4) default NULL;
		
		");





$installer->endSetup();