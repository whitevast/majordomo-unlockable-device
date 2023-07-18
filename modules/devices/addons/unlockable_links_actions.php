<?php

if ($link_type == 'sensor_switch') {
    if ($settings['action_type'] == 'lock' && !gg($object . '.lockstatus')) {
        $action_string = 'callMethodSafe("' . $object . '.lock' . '",array("link_source"=>"' . $device1['LINKED_OBJECT'] . '"));';
    } elseif ($settings['action_type'] == 'unlock' && gg($object . '.lockstatus')) {
        $action_string = 'callMethodSafe("' . $object . '.unlock' . '",array("link_source"=>"' . $device1['LINKED_OBJECT'] . '"));';
	}

    if ($settings['source_value_type']!='') {
        $period = (int)$settings['source_value_time'];
        if ($period<1) $period=1;
        if ($settings['source_value_type'] == 'avg') {
            $value = getHistoryAvg($device1['LINKED_OBJECT'] . '.value',(-1)*$period);
        } elseif ($settings['source_value_type'] == 'min') {
            $value = getHistoryMin($device1['LINKED_OBJECT'] . '.value',(-1)*$period);
        } elseif ($settings['source_value_type'] == 'max') {
            $value = getHistoryMax($device1['LINKED_OBJECT'] . '.value',(-1)*$period);
        }
    }

    if ($settings['condition_type'] == 'above' && $value >= (float)$settings['condition_value']) {
        //do the action
    } elseif ($settings['condition_type'] == 'below' && $value < (float)$settings['condition_value']) {
        //do the action
    } else {
        //do nothing
        $action_string = '';
    }
}