<?php
// session_start();
require_once 'authorize.php';
require_once 'med-BAL.php';

$returnArrayData = array();
$auth = new Authorization();
$bal = new BAL();

// class Ajax
// {
//     function __construct($comand)
//     {
//         $this->ChooseMethod($comand);
//     }
    
//     private function ChooseMethod($comand) {
        if ($auth->IsAuthorized('organization')) {
//             switch ($comand) {
            switch ($_POST['comand']) {
                case 'ajax_form_main':
                    echo json_encode($bal->GetOrganizationSummaryData());
                    break;
                
                case 'ajax_form_main_phones':
                    echo json_encode($bal->GetPhones($id = $_SESSION['user_id']));
                    break;
                
                case 'ajax_form_main_districtRegion':
                    echo json_encode(array(
                        'districtRegion' => $bal->GetDistrictRegionByRegion($_POST['regionId'])
                    ));
                    break;
                //получаем списки всего количества
                case 'ajax_form_main_region_service_institution':
                    echo json_encode(array(
                        'arrayTypeCompanes' => $bal->GetTypeInstitutions(),//типы учереждений
                        'arrayServices' => $bal->GetNamesServices(),//сервисы
                        'arrayInsuranceCompanes' => $bal->GetNamesInsuranceCompanes(),//страховые компании
                        'regiones' => $bal->GetRegiones()//регионы
                    ));
                    break;
                
                case 'ajax_form_main_city':
                    echo json_encode($bal->GetCitesByDistrictRegion($_POST['districtRegionId']));
                    break;
                
                case 'ajax_form_main_delete_phone':
                    $bal->DeletePhone($_POST['phoneId']);
                    break;
                
                case 'ajax_form_main_delete_img':
                    $bal->DeleteImage($_POST['imageId']);
                    break;
                    
                case 'ajax_form_regiatration_typeCompany':
                    echo json_encode(array(
                    'arrayTypeCompanes' => $bal->GetTypeInstitutions()
                    ));
                    break;
                    
                default:
                    echo json_encode(array('error: action default break'));
                    break;
            }
        }
//     }
// }

// $ajax = new Ajax($_POST['comand']);
?>