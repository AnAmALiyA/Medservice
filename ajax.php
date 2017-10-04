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
            
            //arrayLocation.
                        //улица - actualLocation
                        //город - locality
                        //регион область - districtRegion
                        //область - region
                        //дом - numberHome
                            //id
                            //name

        //получить массив выпадающих списков
        $returnArrayData['arrayTypeCompanes'] = $bal->GetTypeInstitution();
        $returnArrayData['arrayServices'] = $bal->GetNamesServices();
        $returnArrayData['arrayInsuranceCompanes'] = $bal->GetNamesInsuranceCompanes();
        $returnArrayData['arrayRegiones'] = $bal->GetRegiones();
            //id
            //name
        $returnArrayData['arrayPhone'] = $bal->GetPhones();
            //id
            //name
        $returnArrayData['arrayDayTimeWork'] = $bal->GetDaysTimesWork();

        $returnArrayData['logo'] = $bal->GetLogo();
       
        echo json_encode($returnArrayData);
    }
}


?>