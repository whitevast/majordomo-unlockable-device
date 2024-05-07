<?php

$ot = $this->object_title;
$ncno = $this->getProperty('ncno');
$this->setProperty('updated', time());

$this->callMethod('keepAlive');

if ($this->getProperty('isActivity')) {
    $linked_room = $this->getProperty('linkedRoom');
    if (getGlobal('NobodyHomeMode.active')) {
        callMethodSafe('NobodyHomeMode.deactivate', array('sensor' => $ot, 'room' => $linked_room));
    }
    $nobodyhome_timeout = 1 * 60 * 60;
    if (defined('SETTINGS_BEHAVIOR_NOBODYHOME_TIMEOUT')) {
        $nobodyhome_timeout = SETTINGS_BEHAVIOR_NOBODYHOME_TIMEOUT * 60;
    }
    if ($nobodyhome_timeout) {
        setTimeOut('nobodyHome', "callMethodSafe('NobodyHomeMode.activate');", $nobodyhome_timeout);
    }
    if ($linked_room) {
        callMethodSafe($linked_room . '.onActivity', array('sensor' => $ot));
    }
}

$description = $this->description;
if (!$description) {
    $description = $ot;
}
if ($this->getProperty('notify_lockstatus')) {
    if (isset($params['NEW_VALUE'])) {
        if (!$params['NEW_VALUE']) {
            $msg = $this->getProperty('notify_msg_unlock');
            if (!$msg) $msg = $description . ' Замок открыт';
            saySafe($msg, 2);
        } else {
            $msg = $this->getProperty('notify_msg_lock');
            if (!$msg) $msg = $description . ' Замок закрыт';
            saySafe($msg, 2);
        }
    }
}

$this->callMethodSafe('logicAction');

startMeasure('statusUpdatedLinkedDevices');
include_once(dirname(__FILE__) . '/devices.class.php');
$dv = new devices();
$dv->checkLinkedDevicesAction($ot, $params);
endMeasure('statusUpdatedLinkedDevices');