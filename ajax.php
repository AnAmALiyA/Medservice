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
        
        $returnArrayData['arrayTypeCompany'] = $bal->GetTypeInstitution();
        
        $returnArrayData['arrayServices'] = $bal->GetNamesServices();
        $returnArrayData['arrayInsuranceCompanes'] = $bal->GetNamesInsuranceCompanes();
        
        $returnArrayData['arrayLocation'] = $bal->GetRegiones();
        $returnArrayData['arrayPhone'] = $bal->GetPhones();
        $returnArrayData['arrayDayWork'] = $bal->GetDaysWork();
        $returnArrayData['arrayTimeWork'] = $bal->GetTimesWork();
        $returnArrayData['logo'] = $bal->GetLogo();
       
        echo json_encode($returnArrayData);
    }    
}


?>