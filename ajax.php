<?php
//session_start();
require_once 'authorize.php';
require_once 'med-BAL.php';

$returnArrayData = array();
$auth = new Authorization();
$bal = new BAL();

if (isset($_POST['ajax_form_main']) && empty($_POST['ajax_form_main'])){
    if($auth->IsAuthorized('organization')){
        
        $returnArrayData['arrayOrganizationData'] = $bal->GetOrganizationData();
        //$returnArrayData['arrayOrganizationData']
            //typeCompany.id
            //typeCompany.name
            
            //arrayServices.id
            //arrayServices.name
            
            //arrayInsuranceCompanes.id
            //arrayInsuranceCompanes.name
            
            //arrayLocation.id
            //arrayLocation.name    //область / город /район /улица /дом

        //получить массив выпадающих списков
        $returnArrayData['arrayTypeCompanes'] = $bal->GetTypeInstitution();
        $returnArrayData['arrayServices'] = $bal->GetNamesServices();
        $returnArrayData['arrayInsuranceCompanes'] = $bal->GetNamesInsuranceCompanes();
        $returnArrayData['arrayLocation'] = $bal->GetLocation();
        
        $returnArrayData['arrayPhone'] = $bal->GetPhones();
        $returnArrayData['arrayDayTimeWork'] = $bal->GetDaysTimesWork();
//         $returnArrayData['arrayTimeWork'] = $bal->GetTimesWork();
        $returnArrayData['logo'] = $bal->GetLogo();
       
        echo json_encode($returnArrayData);
    }    
}


?>