<?php
	return CMap::mergeArray(
		require(dirname(__FILE__) . '/main.php'),
		// Include overrides below
		array(
		)
	);