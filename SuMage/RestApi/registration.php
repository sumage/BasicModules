
<?php
/**
 * The registration.php is a standardized file that follows the same pattern for all modules.
 * The only thing that varies is the module name, which in our case is SuMage_RestApi.
 * 
 * Copyright © 2017 sushant Kumar (sushant693@gmail.com) All rights reserved.
 */

\Magento\Framework\Component\ComponentRegistrar::register(
\Magento\Framework\Component\ComponentRegistrar::MODULE, 
'SuMage_RestApi',
__DIR__
);