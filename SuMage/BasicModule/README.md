
****Create a module in Magento 2 ****
-> First create all folder in magento root folder app/code/SuMage/BasicModule.

-> you need to create an etc/module.xml file. This file is required for the module to exist.
    This file etc/module.xml contains the following information:
        Module name
        Module version
        Dependencies

-> Create the registration.php, which tells Magento how to locate the module.
    create the file app/code/SuMage/BasicModule/registration.php.

-> These two files are basic for register a module to magento2.
        php bin/magento setup:upgrade
    Run above command in magento 2 root directory and check SuMage_BasicModuleis available in output.

-> check the file app/etc/config.php. It has a list of auto-generated modules that are active.

****how to create a new page, we’ll create a page which returns JSON with one parameter: the message “HELLO WORLD!” ****
-> To add a new page in Magento 2, you need to create a new controller, a controller is a file located at a specific place which responds to a specific route. A route in Magento 2 is a standard URL that consists of three parts:

        frontName
        controllerName
        actionName
-> There are two types of route:- adminhtml and frontend.since we’re working in the frontend area, we’ll add the etc/frontend/routes.xml file for our Learning_HelloPage module:

-> Now create a controller with Controller/Page/View.php:
