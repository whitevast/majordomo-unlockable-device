<?php

$status = $this->getProperty('lockstatus');
if ($status) {
    $this->callMethod('unlock');
} else {
    $this->callMethod('lock');
}