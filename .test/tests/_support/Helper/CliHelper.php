<?php
namespace Helper;
// namespace Codeception\Module;


// here you can define custom actions
// all public methods declared in helper class will be available in $I

class CliHelper extends \Codeception\Module
{
    public function killLastProcess()
   {
       echo "run command1";

         $pid = trim($this->getModule('Cli')->output);
         $this->debug('PID: ' . $pid);
         echo "run command1";
         $this->getModule('WebDriver')->runShellCommand("php ./console sendnotification:send-mails");
         echo "run command3";

   }

}
