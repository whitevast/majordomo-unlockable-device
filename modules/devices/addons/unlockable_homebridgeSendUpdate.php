<?php

$payload['service'] = 'LockMechanism';
$payload['characteristic'] = 'LockCurrentState';
$payload['value'] = (int)gg($device1['LINKED_OBJECT'] . '.lockstatus');
sg('HomeBridge.to_set', json_encode($payload));
$payload['name'] .= "_sensor";
$payload['service_name'] .= "_sensor";
$payload['service'] = 'ContactSensor';
$payload['characteristic'] = 'ContactSensorState';
$nc = gg($device1['LINKED_OBJECT'] . '.ncno') == 'nc';
$payload['value'] = $nc ? 1 - gg($device1['LINKED_OBJECT'] . '.status') : gg($device1['LINKED_OBJECT'] . '.status');
