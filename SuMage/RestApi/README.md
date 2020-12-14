****Module for creating CMS Static Widget programmatically.  ****
-> First create module.xml and registration.php to register a moduleto magento 2.

-> Now you can follow following steps to create custom API in magento 2.

    Access API with Rest Method:

    Step 1  System =>  Integrations => Add Integration

    Step 2  System => User Roles => Add New Role

    After creating this access for access authorise resource. Now lets create an API As creating a module.

-> File structure for creating Rest API   	
    SuMage
        RestApi
            Api
                Customer
                    CustomerInterface.php
            etc
                di.xml
                module.xml
                webapi.xml
            Model
                Customer
                    Customer.php
            registration.php
        
-> <h3>Webapi.xml</h3>
    If you wants to create a method which calls through api must be declared in webapi.xml.Here I create login method for Sample Example.For Ex.
    url=”MAGENTOROOT/V1/api/customer/login”
    method="POST"
    ref="anonymous"
    Url which tell the path of access api Method pass the parameters inside api Ref  declaration who can access method.

<h3>di.xml</h3>
    Basically di.xml using Overriding core module.
    Here we declare Login Method in CustomerInterface  And define in Customer model.