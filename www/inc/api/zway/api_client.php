<?php
/*
	phpMyDomo : Home Automation Web Interface
	http://www.phpmydomo.org
    ----------------------------------------------
	Copyright (C) 2014 James Harmey

	LICENCE: ###########################################################
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>
	#####################################################################
*/

/* 
#########################################################################################
ZWay API ################################################################################
#########################################################################################
*/

class PMD_ApiClient extends PMD_Root_ApiClient{

	//----------------------------------------------------------------------------------
	function ApiListInfos(){
		if($this->ApiFetch('list','info')){
			$info = $this->api_response;
		}
		//$this->Debug('Info',$this->infos);
	}


	//----------------------------------------------------------------------------------
	function ApiListDevices(){
		if($this->ApiFetch('list','device')){
			$devices = $this->api_response;
			foreach($devices['data']['devices'] as $dev){
				$d=array();
				$d['raw'] = $dev;
				$d['name'] = $dev['metrics']['title'];
				$d['address'] = $dev['id'];

				if($dev['deviceType'] == 'switchBinary'){
					$d['class'] = 'command';
					$d['type'] = 'switch';
					$d['state'] = $dev['metrics']['level'];
				}
				elseif($dev['deviceType'] == 'switchMultilevel'){
                                        $d['class'] = 'command';
                                        $d['type'] = 'dimmer';
                                        $d['value'] = $dev['metrics']['level'];
                                }
				elseif($dev['deviceType'] == 'toggleButton'){
					$d['class'] = 'scene';
                                        $d['type'] = 'group';
				}
				elseif($dev['deviceType'] == 'sensorMultilevel' ){
                                        $d['class'] = 'sensor';
					$d['value'] = $dev['metrics']['level'];
					$d['unit'] = $dev['metrics']['scaleTitle'];

					if($dev['metrics']['probeTitle'] == 'Temperature'){
						$d['type'] = 'temp';
						$d['img_url'] = $dev['metrics']['icon'];
					}
					elseif($dev['metrics']['probeTitle'] == 'Power'){
                                                $d['type'] = 'consum';
                                        }
					elseif($dev['metrics']['probeTitle'] == 'Electric '){
                                                $d['type'] = 'counter';
                                        }
				}
				//elseif($dev['deviceType'] == 'switchControl'){
                                //      $d['class'] = 'command';
                                //      $d['type'] = 'switch';
				//	pass;
                                //}

				$this->RegisterDevice($d);
			}

			//$this->Debug('JSON API Response',$this->api_response);
			//$this->Debug('Devices',$this->devices);
		}
		else{
			if($this->debug){
				$this->o_kernel->PageError('500',"Failed to contact server at {$this->api_url} ");
			}
		}
	}

}
?>
