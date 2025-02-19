<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
use zcrmsdk\crm\crud\ZCRMRecord;
use zcrmsdk\oauth\ZohoOAuth;
use zcrmsdk\crm\bulkcrud\ZCRMBulkCallBack;
use zcrmsdk\crm\bulkcrud\ZCRMBulkCriteria;
use zcrmsdk\crm\bulkcrud\ZCRMBulkQuery;
use zcrmsdk\crm\bulkcrud\ZCRMBulkRead;
//use zcrmsdk\oauth\ZohoOAuth;
use zcrmsdk\oauth\ZohoOAuthClient;
use Illuminate\Support\Facades\Storage;

class ZohoController extends Controller
{
    public function __construct()
    {

        $exists = Storage::disk('local')->exists('/token/zcrm_oauthtokens.txt');
        if(!$exists){
            Storage::disk('local')->put('/token/zcrm_oauthtokens.txt', '');
        }

        $configuration = array("client_id" => "1000.P15TJJ3B5PQJF7CXZPMMOJLH1HT50P",
                                "client_secret" => "f5ed8a0d0e7f1a58e4f2a0d265d9784da5cb0be984",
                                "redirect_uri" => "http://localhost:8000/",
                                "currentUserEmail" => "vikram@earningdesigns.com", 
                                "apiBaseUrl"=>"www.zohoapis.in",
                                "apiVersion"=>"v2",
                                "access_type"=>"offline",
                                "persistence_handler_class"=>"ZohoOAuthPersistenceHandler",
                                "accounts_url"=>"https://accounts.zoho.in",
                                "token_persistence_path" => storage_path('app\token') );

        ZCRMRestClient::initialize($configuration);
       
        $oAuthClient = ZohoOAuth::getClientInstance();

        // $grantToken = "1000.cde740fef5cac544990a28528a45f22c.38df68148ac9cd6b96f69a5a5b981a4f";
        // $oAuthTokens = $oAuthClient->generateAccessToken($grantToken);
       // dd($oAuthTokens);
        // dd($oAuthTokens);ZohoCRM.modules.all
    }

    // public function oAuth($grantToken)
    // {
    //     $oAuthClient = ZohoOAuth::getClientInstance();
    //     $oAuthClient->generateAccessToken($grantToken);
    // }

    public function createUser()
    {
        $orgIns = ZCRMRestClient::getOrganizationInstance(); // to get the organization instance

        $user = ZCRMUser::getInstance(NULL, NULL); //to get the user instance
        $user->setLastName("subject"); //to set the last name of the user
        $user->setFirstName("test"); //to set the first name of the user
        $user->setEmail("test1@gmail.com"); //to set the email id of the user
        $role = ZCRMRole::getInstance("{role_id}", "{role_name}"); //to get the role
        $user->setRole($role); //to get the role of the user
        $profile = ZCRMProfile::getInstance("{profile_id}", "{profile_name}"); //to get the profile
        $user->setProfile($profile); //to set the profile of the user
        $responseIns = $orgIns->createUser($user); //to create the user
        echo "HTTP Status Code:" . $responseIns->getHttpStatusCode(); //To get http response code
        echo "Status:" . $responseIns->getStatus(); //To get response status
        echo "Message:" . $responseIns->getMessage(); //To get response message
        echo "Code:" . $responseIns->getCode(); //To get status code
        echo "Details:" . json_encode($responseIns->getDetails());
    }

    public function createSubscribers()
    {
        $records = array();

        $record["Email"] = "harish4@example.com";
        $record["Name"] = "harish";
        $record["Phone"] = "81900657820";
        $record["Plan"] = "Monthly";
        $record["Subscription_Status"] = "Free Trial";

        $this->createRecord("LILA_Subscribers_DEVs", $records);

        // $record->setFieldValue("Email", "harish4@example.com");
        // $record->setFieldValue("Name", "harish");
        // $record->setFieldValue("Phone", "81900657820");
        // $record->setFieldValue("Plan", "Monthly");
        // $record->setFieldValue("Subscription_Status", "Free Trial");
        /** Following methods are being used only by Inventory modules **/
    }

    public function createRecord($moduleName, $fields)
    {
        $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance($moduleName);
        $records = array();
        $record = ZCRMRecord::getInstance($moduleName, null);

        foreach ($fields as $fieldName => $fieldsValue)
            $record->setFieldValue($fieldName, $fieldsValue);

        array_push($records, $record);

        $responseIn = $moduleIns->createRecords($records);
        foreach ($responseIn->getEntityResponses() as $entityResponse) {
            if ("success" == $entityResponse->getStatus()) {
                echo "HTTP Status Code:" . $responseIn->getHttpStatusCode(); // To get http response code
                echo "Status:" . $entityResponse->getStatus();
                echo "Message:" . $entityResponse->getMessage();
                echo "Code:" . $entityResponse->getCode();
                $createdRecordInstance = $entityResponse->getData();
                echo "EntityID:" . $createdRecordInstance->getEntityId();
                echo "moduleAPIName:" . $createdRecordInstance->getModuleAPIName();
            }
        }
    }

    public function createRecords()
    {
        $moduleIns = ZCRMRestClient::getInstance()->getModuleInstance("LILASubscribersDEVs"); //to get the instance of the module
        $records = array();
        $record = ZCRMRecord::getInstance("LILASubscribersDEVs", null);  //To get ZCRMRecord instance
        
        if(!isset($data)){
            $data= [];
            $data['email'] = 'harish@earningdesigns.com'; 
            $data['name'] = 'harish'; 
            $data['mobile'] = '8698108190'; 
        }
        $record->setFieldValue("Email", $data['email']);
        $record->setFieldValue("Name", $data['name']);
        $record->setFieldValue("Phone", $data['mobile']);
        $record->setFieldValue("Plan", 'monthly');
        $record->setFieldValue("Subscription_Status", "Free Trial");
        /** Following methods are being used only by Inventory modules **/
       
        array_push($records, $record); // pushing the record to the array.
        
        // $responseIn = $moduleIns->createRecords($records,$trigger,$lar_id); // updating the records.$trigger,$lar_id are optional
        // foreach ($responseIn->getEntityResponses() as $responseIns) {
        //     echo "HTTP Status Code:" . $responseIn->getHttpStatusCode(); // To get http response code
        //     echo "Status:" . $responseIns->getStatus(); // To get response status
        //     echo "Message:" . $responseIns->getMessage(); // To get response message
        //     echo "Code:" . $responseIns->getCode(); // To get status code
        //     echo "Details:" . json_encode($responseIns->getDetails());
        // }

        //This the same code in the example that de documentations gives.
        $bulkAPIResponse = $moduleIns->createRecords($records);
        $entityResponses = $bulkAPIResponse->getEntityResponses();
        foreach ($entityResponses as $entityResponse) {
            // if("success"==$entityResponse->getStatus()) 
            // { 
            echo "Status:" . $entityResponse->getStatus();
            echo "Message:" . $entityResponse->getMessage();
            echo "Code:" . $entityResponse->getCode();
            $createdRecordInstance = $entityResponse->getData();
            echo "EntityID:" . $createdRecordInstance->getEntityId();
            echo "moduleAPIName:" . $createdRecordInstance->getModuleAPIName();
            // }
        }
    }
}
