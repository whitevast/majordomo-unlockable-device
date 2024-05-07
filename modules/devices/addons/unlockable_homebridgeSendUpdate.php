<?php

if ($params['PROPERTY'] == 'lockstatus'){
	$payload['service'] = 'LockMechanism';
	$payload['characteristic'] = 'LockTargetState';
	$payload['value'] = $params['NEW_VALUE'];
	addToOperationsQueue("homekit_queue", "set", json_encode($payload, JSON_UNESCAPED_UNICODE));
	$payload['characteristic'] = 'LockCurrentState';
}
else if ($params['PROPERTY'] == 'status'){
	$payload['service_name'] .= "_sensor";
	$payload['service'] = 'ContactSensor';
	$payload['characteristic'] = 'ContactSensorState';
	$nc = gg($device1['LINKED_OBJECT'] . '.ncno') == 'nc';
	$payload['value'] = $nc ? 1 - $params['NEW_VALUE'] : $params['NEW_VALUE'];
}
