## How to run tests
1. Run `composer install` into your root repository (This will install all the dependencies that codeception needs);
2. Copy tests/acceptance.suite.dist.yml to tests/acceptance.suite.yml Customize tests/acceptance.suite.yml it to your environment
3. Run `vendor/bin/codecept build`
4. php `vendor/bin/codecept run  [name of the test you want to run] --steps`


All the tests can be found under directory `tests/acceptance`. This directory contains automation
tests for Magento, Woocommerce (humcommerce), Prestashop, Xcart, Opencart, OScommerce, Live site, HumDash analytics app


--steps is used for to see steps whats steps does run and what steps does not run.
