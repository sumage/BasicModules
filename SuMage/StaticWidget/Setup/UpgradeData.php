<?php
/**
 * This is used for creating Static CMS page.
 * 
 * Copyright © 2017 sushant Kumar (sushant693@gmail.com) All rights reserved.
 * See COPYING.txt for license details.
 */

namespace SuMage\StaticPageBlock\Setup;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
 
/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var \Magento\Cms\Model\PageFactory
     */
    protected $_pageFactory;
 
    /**
     * Construct
     *
     * @param \Magento\Cms\Model\PageFactory $pageFactory
     */
    public function __construct(
        \Magento\Cms\Model\PageFactory $pageFactory,
        \Magento\Cms\Model\Page $page
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_page = $page;
    }
 
    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '0.0.2') < 0) {
            $setup->startSetup();
            $pageId = $this->_page->checkIdentifier('example1-cms-page', 0);
            if(!$pageId) {
                $page = $this->_pageFactory->create();
                try{
                    $page->setTitle('Example1 CMS page')
                        ->setIdentifier('example1-cms-page') //Set URI
                        ->setIsActive(true)
                        ->setPageLayout('1column')
                        ->setStores(array(0))
                        ->setContent('This is an example of static CMS pages.')
                        ->save();
                } catch(Exception $e){
                    echo $e->getMessage();
                }
            } else {
                echo "</br>This CMS Page is already exist.";
            }
            $setup->endSetup();
        }
    }
}
