<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
use zcrmsdk\crm\bulkcrud\ZCRMBulkCallBack;
use zcrmsdk\crm\bulkcrud\ZCRMBulkCriteria;
use zcrmsdk\crm\bulkcrud\ZCRMBulkQuery;
use zcrmsdk\crm\bulkcrud\ZCRMBulkRead;

class ZohoController extends Controller
{
    public function __construct()
    {
        $configuration = array("client_id" => "1000.N32TOZBUROPP6E0CYQHAECYSE7BCAW", "client_secret" => "ffd94b354845fec34ffca1f576a5b17a9b25416481", "redirect_uri" => "/", "currentUserEmail" => "harish@earningdesigns.com");
        \ZCRMRestClient::initialize($configuration);
    }

    public function createUser(){
        $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance
       
        $user=ZCRMUser::getInstance(NULL, NULL);//to get the user instance
        $user->setLastName("subject");//to set the last name of the user
        $user->setFirstName("test");//to set the first name of the user
        $user->setEmail("test1@gmail.com");//to set the email id of the user
        $role=ZCRMRole::getInstance("{role_id}","{role_name}");//to get the role
        $user->setRole($role);//to get the role of the user
        $profile=ZCRMProfile::getInstance("{profile_id}","{profile_name}");//to get the profile
        $user->setProfile($profile);//to set the profile of the user
        $responseIns=$orgIns->createUser($user);//to create the user
        echo "HTTP Status Code:".$responseIns->getHttpStatusCode(); //To get http response code
        echo "Status:".$responseIns->getStatus(); //To get response status
        echo "Message:".$responseIns->getMessage(); //To get response message
        echo "Code:".$responseIns->getCode(); //To get status code
        echo "Details:".json_encode($responseIns->getDetails());
    }
}
