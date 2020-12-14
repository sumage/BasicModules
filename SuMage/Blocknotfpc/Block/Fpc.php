<?php

namespace SuMage\Blocknotfpc\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\RequestInterface;

class Fpc extends Template
{
    protected $request = null;

    public function __construct(Context $context, RequestInterface $request) {
        $this->request = $request;
        parent::__construct($context);
        $this->_isScopePrivate = true;
    }

    protected function _toHtml()
    {
        if ($this->request->isXmlHttpRequest()) {
            return 'Hello, world!';
        }
    }
}