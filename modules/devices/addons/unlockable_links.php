<?php

$this->device_links['SMotions,SButtons,SOpenClose,SCameras,SUnlockable'] = $this->device_links['SMotions,SButtons,SOpenClose,SCameras'];
unset($this->device_links['SMotions,SButtons,SOpenClose,SCameras']);
$this->device_links['SMotions,SButtons,SOpenClose,SCameras,SUnlockable']['1']['TARGET_CLASS'] = $this->device_links['SMotions,SButtons,SOpenClose,SCameras,SUnlockable']['1']['TARGET_CLASS'] . ',SUnlockable';
array_push($this->device_links['SMotions,SButtons,SOpenClose,SCameras,SUnlockable']['1']['PARAMS']['0']['PARAM_OPTIONS'], array('TITLE' => 'Отпереть', 'VALUE' => 'unlock'), array('TITLE' => 'Запереть', 'VALUE' => 'lock'));
$this->device_links['SSensors']['0']['TARGET_CLASS'] = $this->device_links['SSensors']['0']['TARGET_CLASS'] . ',SUnlockable';
array_push($this->device_links['SSensors']['0']['PARAMS']['4']['PARAM_OPTIONS'], array('TITLE' => 'Отпереть', 'VALUE' => 'unlock'), array('TITLE' => 'Запереть', 'VALUE' => 'lock'));
//dprint($this->device_links, false);