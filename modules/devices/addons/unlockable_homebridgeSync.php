<?php

//Замок
$payload['service'] = 'LockMechanism';
$payload['characteristic'] = 'LockCurrentState';
sg('HomeBridge.to_add', json_encode($payload));
$payload['value'] = (int)gg($devices[$i]['LINKED_OBJECT'] . '.lockstatus');
sg('HomeBridge.to_set', json_encode($payload));
//Датчик закрытия
$payload['name'] .= "_sensor";
$payload['service_name'] .= "_sensor";
$payload['service'] = 'ContactSensor';
sg('HomeBridge.to_add', json_encode($payload));
$payload['characteristic'] = 'ContactSensorState';
$payload['value'] = (int)gg($devices[$i]['LINKED_OBJECT'] . '.ncno') == 'nc' ? 1 - gg($devices[$i]['LINKED_OBJECT'] . '.status') : gg($devices[$i]['LINKED_OBJECT'] . '.status');
sg('HomeBridge.to_set', json_encode($payload));
