<?php
namespace Helper;

use Codeception\Module\WebDriver;
use Facebook\WebDriver\WebDriverKeys;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{
    /**
     * @var \Responsive\ResponsiveThemeTestCases
     */
    protected $webdriver;

    public function _initialize()
    {
        $this->webdriver = $this->getModule('Responsive\ResponsiveThemeTestCases');
        $this->config['webUrl'] = $this->webdriver->_getUrl();
    }


    public function openEmail($email){
        $mailHogUrl = $this->config['mailHogUrl'];
        /**
         * @var WebDriver $I
         */
        $I = $this->webdriver;
        $I->amOnUrl($mailHogUrl);
        $I->waitForElement('form.navbar-form input');
        $I->fillField('form.navbar-form input',$email);
        $I->pressKey('form.navbar-form input', WebDriverKeys::ENTER);
        $I->wait(1);
        $I->click('.messages > div:nth-child(1)');
        $I->switchToIFrame('#preview-html');
        $I->wait(3);
    }


    public function getAppTable($name){

        $config = $this->config['appDB'];

        return $config['prefix'].$name;
    }

    public function getWPTable($name){
        $config = $this->config['wpDB'];

        return $config['prefix'].$name;
    }

    public function executeAppQuery($sql){
        $config = $this->config['appDB'];
        $conn = mysqli_connect(
            $config['host'],
            $config['user'],
            $config['pass'],
            $config['db'],
            $config['port']
        );

        return  $conn->query($sql);
        mysqli_close($conn);
    }

    public function goToApp(){
        $appUrl = $this->config['appUrl'];
        $I = $this->webdriver;
        $I->amOnUrl($appUrl);
    }

    public function amOnHumcommerce(){
        $url = $this->config['webUrl'];
        $I = $this->getModule('WebDriver');
        $I->amOnUrl($url);
    }

    public function executeQueryWeb($sql){
        try{
            $config = $this->config['wpDB'];
            $conn = mysqli_connect(
                $config['host'],
                $config['user'],
                $config['pass'],
                $config['db'],
                $config['port']
            );

             $conn->query($sql);
        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }

        mysqli_close($conn);
    }

    public function getAdminCredentials(){
       return $this->config['wpAdmin'];
    }

    public function getSuperUser(){
        return $this->config['superUser'];
    }


    public function getExistingCustomer(){
        return $this->config['customer'];
    }

    public function updateUserRegistrationDate($email,$date){
        $sql =  "UPDATE  " . $this->getWPTable(
                'users'
            ) . " set user_registered='$date' WHERE  user_email='" . $email . "'";
        $this->executeQueryWeb($sql);
    }

    public function seeUserloginINSiteTable($email)
    {
        $sql="select  main_url from " .$this->getAppTable('site')." WHERE owner='" .$email ."'";
    $result=$this->executeAppQuery($sql);
    $websiteName=$result->fetch_all();
        $I = $this->webdriver;
        $I->assertEquals($websiteName[0][0],"https://www.example.com","websiteName should be match");




    }


    public function generateNewUserData(){
        return ['name'=>uniqid(),'email'=>uniqid()."@mailinator.com"];
    }

}
