<?php

if (in_array($device['TYPE'], array('unlockable'))) {
	if ($data['characteristic'] == 'LockTargetState') {
		if ($data['value']) {
			callMethodSafe($device['LINKED_OBJECT'] . '.unlock');
		} else {
			callMethodSafe($device['LINKED_OBJECT'] . '.lock');
		}
	}
}