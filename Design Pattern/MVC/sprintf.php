<?php
	$body = <<<EOD
	Hello %s
	How are you today %s
	
	Thanks
	
	%s
EOD;

	echo sprintf($body, 'rock', '2016-01-01', 'Claire');