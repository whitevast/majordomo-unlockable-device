<?php
 if ($data['characteristic'] == 'LockTargetState') {
	$payload['service'] = 'LockMechanism';
    $payload['value'] = gg($device['LINKED_OBJECT'] . '.lockstatus');
 } else if ($data['characteristic'] == 'LockCurrentState') {
	$payload['service'] = 'LockMechanism';
	$payload['value'] = gg($device['LINKED_OBJECT'] . '.lockstatus');
 } else if ($data['characteristic'] == 'ContactSensorState'){
	$payload['service_name'] .= "_sensor";
	$payload['service'] = 'ContactSensor';
	$nc = gg($device['LINKED_OBJECT'] . '.ncno') == 'nc';
    $payload['value'] = $nc ? 1 - gg($device['LINKED_OBJECT'] . '.status') : gg($device['LINKED_OBJECT'] . '.status');
 }
