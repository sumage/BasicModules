<?php
/**
 * The registration.php is a standardized file that follows the same pattern for all modules.
 * The only thing that varies is the module name, which in our case is SuMage_StaticWidget.
 * 
 * Copyright © 2017 sushant Kumar (sushant693@gmail.com) All rights reserved.
 */

namespace SuMage\StaticWidget\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Samplewidget extends Template implements BlockInterface
{
    protected $_template = "widget/samplewidget.phtml";
}