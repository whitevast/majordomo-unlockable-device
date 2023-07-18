<?php

 if ($data['characteristic'] == 'LockTargetState') {
	 $payload['service'] = 'LockMechanism';
     $payload['characteristic'] = 'LockTargetState';
     $payload['value'] = gg($device['LINKED_OBJECT'] . '.lockstatus');
	 sg('HomeBridge.to_set', json_encode($payload));
 } else {
	$payload['name'] .= "_sensor";
	$payload['service_name'] .= "_sensor";
	$payload['characteristic'] = 'ContactSensorState';
	$payload['service'] = 'ContactSensor';
	$nc = gg($device['LINKED_OBJECT'] . '.ncno') == 'nc';
    $payload['value'] = $nc ? 1 - gg($device['LINKED_OBJECT'] . '.status') : gg($device['LINKED_OBJECT'] . '.status');
 }
