<?php

//Замок
$payload['service'] = 'LockMechanism';
addToOperationsQueue("homekit_queue", "add", json_encode($payload, JSON_UNESCAPED_UNICODE));
$payload['characteristic'] = 'LockCurrentState';
$payload['value'] = (int)gg($devices[$i]['LINKED_OBJECT'] . '.lockstatus');
addToOperationsQueue("homekit_queue", "set", json_encode($payload, JSON_UNESCAPED_UNICODE));
$payload['characteristic'] = 'LockTargetState';
addToOperationsQueue("homekit_queue", "set", json_encode($payload, JSON_UNESCAPED_UNICODE));
//Датчик закрытия
$payload['service_name'] .= "_sensor";
$payload['service'] = 'ContactSensor';
addToOperationsQueue("homekit_queue", "add/service", json_encode($payload, JSON_UNESCAPED_UNICODE));
$payload['characteristic'] = 'ContactSensorState';
$payload['value'] = (int)gg($devices[$i]['LINKED_OBJECT'] . '.ncno') == 'nc' ? 1 - gg($devices[$i]['LINKED_OBJECT'] . '.status') : gg($devices[$i]['LINKED_OBJECT'] . '.status');
addToOperationsQueue("homekit_queue", "set", json_encode($payload, JSON_UNESCAPED_UNICODE));
