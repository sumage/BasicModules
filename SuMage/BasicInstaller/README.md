
****Create a module in Magento 2 which runs installer and create database tables, modify existing ones, and even add some data into them  ****
-> First create module.xml and registration.php to register a moduleto magento 2.

-> Magento 2 has four types of such scripts: InstallSchema, InstallData, UpgradeSchema, and UpgradeData. The install scripts run only once, while the upgrade scripts are executed every time the module’s version get changed.

-> The steps we need to take to accomplish these tasks are:

    Create a new module.
    Create an InstallSchema script.
    Create an InstallData script.
    Add a new module and verify that a table with the data was created.
    Create an UpgradeSchema script.
    Create an UpgradeData script.
    Run the upgrade scripts and verify that the table has changed.

-> Create a folder Setup and Create the file Setup/InstallSchema.php.

-> 