<?php

class Data
{
   public static function uniqueName(){
     return uniqid();
   }
   public static function uniqueEmail(){
     return uniqid()."@mailinator.com";
   }

 }
