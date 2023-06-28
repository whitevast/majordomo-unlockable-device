<?php

$this->device_types['unlockable'] = array(
	'TITLE'=>'Дверь/окно/ворота с замком',
    'PARENT_CLASS'=>'SDevices',
    'CLASS'=>'SUnlockable',
    'PROPERTIES'=>array(
        'isActivity'=>array('DESCRIPTION'=>LANG_DEVICES_IS_ACTIVITY,'_CONFIG_TYPE'=>'yesno','_CONFIG_HELP'=>'SdIsActivity'),
        'notify_status'=>array('DESCRIPTION'=>LANG_DEVICES_NOTIFY_STATUS,'_CONFIG_TYPE'=>'yesno'),
		'notify_lockstatus'=>array('DESCRIPTION'=>LANG_DEVICES_NOTIFY_STATUS . ' замка','_CONFIG_TYPE'=>'yesno'),
        'notify_nc'=>array('DESCRIPTION'=>LANG_DEVICES_NOTIFY_NOT_CLOSED,'_CONFIG_TYPE'=>'yesno'),
		'ncno'=>array('DESCRIPTION'=>LANG_DEVICES_NCNO,'_CONFIG_TYPE'=>'select','_CONFIG_OPTIONS'=>'nc=Normal Close,no=Normal Open','_CONFIG_DEFAULT'=>'nc'),
        'openType'=>array('DESCRIPTION'=>LANG_DEVICES_OPENTYPE,
            '_CONFIG_TYPE'=>'select','_CONFIG_HELP'=>'SdOpenType',
            '_CONFIG_OPTIONS'=>
                'gates='.LANG_DEVICES_OPENTYPE_GATES.
                ',window='.LANG_DEVICES_OPENTYPE_WINDOW.
                ',door='.LANG_DEVICES_OPENTYPE_DOOR,
			'_CONFIG_DEFAULT'=>'door'),
        'notify_msg_opening'=>array('DESCRIPTION'=>LANG_DEVICES_MSG_OPENING,'_CONFIG_TYPE'=>'text'),
        'notify_msg_closing'=>array('DESCRIPTION'=>LANG_DEVICES_MSG_CLOSING,'_CONFIG_TYPE'=>'text'),
        'notify_msg_reminder'=>array('DESCRIPTION'=>LANG_DEVICES_MSG_REMINDER,'_CONFIG_TYPE'=>'text'),
        'notify_msg_lock'=>array('DESCRIPTION'=>'Сообщение при запирании','_CONFIG_TYPE'=>'text'),
        'notify_msg_unlock'=>array('DESCRIPTION'=>'Сообщение при отпирании','_CONFIG_TYPE'=>'text'),
		'lockstatus'=>array('DESCRIPTION'=>'Статус замка','ONCHANGE'=>'lockstatusUpdated','KEEP_HISTORY'=>365),
    ),
    'METHODS'=>array(
        'statusUpdated'=>array('DESCRIPTION'=>'Status updated event'),
        'lockstatusUpdated'=>array('DESCRIPTION'=>'Status lock event'),
        'switch'=>array('DESCRIPTION'=>'Switch'),
        'unlock'=>array('DESCRIPTION'=>'Open Lock','_CONFIG_SHOW'=>1),
        'lock'=>array('DESCRIPTION'=>'Close Lock','_CONFIG_SHOW'=>1),
    ),
);