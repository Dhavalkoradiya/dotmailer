<?php
  $username = "API NAME"; //Your API username
  $password = "API PASSWORD";  //your API password
  $client = new SoapClient("http://apiconnector.com/api.asmx?WSDL"); //Instantiate the Soap client
  
  //We will add a new contact, testemail@test.co.uk , and populate the firstname, lastname and age datafields
  
  $addressbookid='#######';
  $email = "TEST@gmail.com";
  $AudienceType="B2B";
  $OptInType="Single";
  $EmailType="Html";
  $FirstName = "Rhys";
  $LastName="LAST";
  $notes = "This is an API test contact" ;
  
  $keys = array("FIRSTNAME","LASTNAME");
  $var1 = new SoapVar($FirstName,XSD_STRING,"string","http://www.w3.org/2001/XMLSchema"); //Create an instance of SoapVar for each one of the values
  $var2 = new SoapVar($LastName,XSD_STRING,"string","http://www.w3.org/2001/XMLSchema");
  
  $values = array($var1);
  $Datafields = array ('Keys'=>$keys,'Values'=>$values);
  $contact = array ("Email"=>$email,"AudienceType"=>$AudienceType,"OptInType"=>$OptInType,"EmailType"=>$EmailType,"ID"=>-1,"DataFields"=>$Datafields,"Notes"=>$notes);
  $params = array ("username"=>$username,"password"=>$password,"contact"=>$contact,"addressbookId"=>$addressbookid);
  $result = $client->AddContactToAddressbook($params);
?>