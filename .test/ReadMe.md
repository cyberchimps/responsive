## How to run tests
1. Run `composer install` into your root repository (This will install all the dependencies that codeception needs);
2. Update tests/acceptance.suite.yml & tests/customizer.suite.yml with your credentials & preferences
3. Run `vendor/bin/codecept build`
4. php `vendor/bin/codecept run  [name of the test you want to run] --steps`


acceptance suite has basic tests which checks WordPress guidelines for Theme.
customizer suite has tests to check customizer options

## Updating tests/acceptance.suite.yml & tests/customizer.suite.yml parameteres
1. url: Provide URL where Responsive theme with Unit Test data is installed
2. host: LambdaTest token (Not needed to run tests on local server)
3. port: Server Port (For LambdaTest use 80)
4. capabilities -> build: Build Name to be displayed on LambdaTest

To update WordPress Admin username & password in testcases edit the tests/support/Page/Customizer/AdminLogin.php

To run tests locally comment the 'host' & 'port' entries from yml files. Also make sure selenium server is running locally.