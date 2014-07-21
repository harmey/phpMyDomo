<?php
//#############################################################################
// REQUIRED #################################################################
//#############################################################################

$api['method'] = 'json_get'; //api method : json_get | json_rpc2


//api URL ----------------------------------------------------------------
$api['urls']['api']	=$this->conf['urls']['host'].':8083';
$api['urls']['www']	=$this->conf['urls']['host'].':8083';
$api['dir_admin']	='/z-way-ha/';


// Set Commands Values -------------------------------------------------------
// Values used when Sending a command
$api['set']['switch']['on']		='on';
$api['set']['switch']['off']		='off';

$api['set']['scene']['on']		='on';
$api['set']['scene']['off']		='off';

$api['set']['group']['on']		='On';
$api['set']['group']['off']		='Off';

$api['set']['dimmer']['on']		='on';
$api['set']['dimmer']['off']		='off';
$api['set']['dimmer']['min']		=0;
$api['set']['dimmer']['max']		=100;


// Actions -------------------------------------------------------------------
$api['actions']['set']['switch']		='/ZAutomation/api/v1/devices/{address}/command/{state}';
$api['actions']['set']['dimmer']		='/ZAutomation/api/v1/devices/{address}/command/{state}';
$api['actions']['set']['dim_level']             ='/ZAutomation/api/v1/devices/{address}/command/exact?level={state}';
$api['actions']['set']['scene']			='/ZAutomation/api/v1/devices/{address}/command/{state}';
$api['actions']['set']['group']			='/ZAutomation/api/v1/devices/{address}/command/{state}';


//#############################################################################
// CUSTOM api_client ##########################################################
//#############################################################################

// List actions URLS -------------------------------------
$api['actions']['list']['device']		='/ZAutomation/api/v1/devices';
//$api['actions']['list']['scene']		='/json.htm?type=scenes';
//$api['actions']['list']['switch']		='/json.htm?type=command&param=getlightswitches';
$api['actions']['list']['info']			='/ZAutomation/api/v1/status';



// States (auto formatted if defined)  ---------------------------------------
// states (values) from the 'result' rows
$api['states']['command']['switch']['Off']		='off';
$api['states']['command']['switch']['On']		='on';

$api['states']['command']['dimmer']['Off']		='off';
$api['states']['command']['dimmer']['On']		='on';

//$api['states']['command']['blinds']['Open']		='off';
//$api['states']['command']['blinds']['Closed']		='on';

$api['states']['scene']['scene']['Off']			='off';
$api['states']['scene']['scene']['On']			='on';

$api['states']['scene']['group']['Off']			='off';
$api['states']['scene']['group']['On']			='on';

//$api['states']['sensor']['pir']['Off']		='off';
//$api['states']['sensor']['pir']['On']			='on';

//$api['states']['sensor']['bool']['Open']		='off';
//$api['states']['sensor']['bool']['Closed']		='on';


//json definition (auto formatted if defined) -------------------------------
// fields from the 'result' rows
//$api['fields']['raw_value1'] = "level";
//$api['fields']['address'] = "id";
//$api['fields']['message'] = "title";


//json_get definition ----------------------------------------------------------
$api['json']['status'] = "code";	//field with the Status of the response
//$api['json']['result'] = "devices";	//field with the list of devices

// json received statuts value in the "status" field
$api['json_status']['ok'] = 200;
$api['json_status']['err'] = 404;

?>
