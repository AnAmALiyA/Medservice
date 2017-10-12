<?php
// session_start();
require_once 'authorize.php';
require_once 'med-BAL.php';

$returnArrayData = array();
$auth = new Authorization();
$bal = new BAL();
// $array[] = 'isset _POST = '.isset($_POST['ajax_form_main']);
if ($auth->IsAuthorized('organization')) {
    if (isset($_POST['ajax_form_main'])) {
        $returnArrayData = $bal->GetOrganizationSummaryData();
        echo json_encode($returnArrayData);
    }
    
    if (isset($_POST['ajax_form_main_phone']){
        echo json_encode($bal->GetPhones());
    }
    
    if (isset($_POST['ajax_form_main_region_service_institution']){
        echo json_encode(
                $bal->GetTypeInstitutions(), 
                $bal->GetNamesServices(), 
                $bal->GetNamesInsuranceCompanes(),
                $bal->GetRegiones()
            );
    }
    //регион области по id области
    if (isset($_POST['ajax_form_main_districtRegion']){
        echo json_encode($bal->GetDistrictRegionByRegion($_POST['regionId']));
    }
    //город по id региона области
    if (isset($_POST['ajax_form_main_city']){
        echo json_encode($bal->GetCitesByDistrictRegion($_POST['districtRegionId']));
    }
    //удалить телефон
    if (isset($_POST['ajax_form_main_delete_phone'])) {
        // TODO удалить телефон
        $bal->DeletePhone($_POST['phoneId']);
    }
    
    if (isset($_POST['ajax_form_main_delete_img']))
        $bal->DeleteImage($_POST['imageId']);
    {
        // TODO удалить картинук
    }
}
?>