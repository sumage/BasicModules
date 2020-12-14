<?php
/**
 * This is used for creating CMS BLOCK.
 * 
 * Copyright © 2017 sushant Kumar (sushant693@gmail.com) All rights reserved.
 * See COPYING.txt for license details.
 */

namespace SuMage\StaticPageBlock\Setup;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $blockFactory;

    public function __construct(BlockFactory $blockFactory)  {
        $this->blockFactory = $blockFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $cmsBlockData = [
            'title' => 'Custom CMS Block',
            'identifier' => 'custom_cms_block', //'footer_links_block', 
            'content' => "<h1>Write your custom cms block content.......</h1>",
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];
        $setup->startSetup();
        $blockId = $this->blockFactory->create()->load($cmsBlockData['identifier'],'identifier')->getId();
        if(!$blockId) {
            try {   
                $this->blockFactory->create()->setData($cmsBlockData)->save();
            } catch(Exception $e){
                echo $e->getMessage();
            }
        } else{
            echo "</br>This block identifier is already exist.";
        }
        $setup->endSetup();
    }
} 