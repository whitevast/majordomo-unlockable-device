<?php
//Проходим по массиву и при присутствии определенных ключей, вносим изменения в этот массив, добавляем свои опции
foreach($this->device_links as $linkkey => &$links){
	foreach($links as &$link){
		if($link['LINK_NAME'] == "switch_timer") $thiskey = $linkkey;
		if($link['LINK_NAME'] == "switch_it" or $link['LINK_NAME'] == "sensor_switch"){
			$link['TARGET_CLASS'] = $link['TARGET_CLASS'] . ',SUnlockable';
			foreach($link['PARAMS'] as &$param){
				if($param['PARAM_NAME'] == "action_type") array_push($param['PARAM_OPTIONS'], array('TITLE' => 'Отпереть', 'VALUE' => 'unlock'), array('TITLE' => 'Запереть', 'VALUE' => 'lock'));
			}
		}
	}
}
//В изначальный ключ массива добавляем свой аддон
if(isset($thiskey)){
	$this->device_links[$thiskey . ',SUnlockable'] = $this->device_links[$thiskey];
	unset($this->device_links[$thiskey]);
}
//dprint($this->device_links, false);