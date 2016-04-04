<?php
if (!defined('FLUX_ROOT')) exit;

$title     = Flux::message('WoeTitle');
$dayNames  = array("Domingo", "Segunda", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado");
$woeTimes  = array();

foreach ($session->loginAthenaGroup->athenaServers as $athenaServer) {
	$times = $athenaServer->woeDayTimes;
	if ($times) {
		$woeTimes[$athenaServer->serverName] = array();
		foreach ($times as $time) {
			$woeTimes[$athenaServer->serverName][] = array(
				'startingDay'  => $dayNames[$time['startingDay']],
				'startingHour' => $time['startingTime'],
				'endingDay'    => $dayNames[$time['endingDay']],
				'endingHour'   => $time['endingTime']
			);
		}
	}
}
?>
