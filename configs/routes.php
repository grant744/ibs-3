<?php

return [
	
	/*

	'example/route' => [
		'controller_id' => 'example',
		'action_id' => 'example',
	],
	
	'example/route/with/{int:\d+}' => [
		'controller_id' => 'example',
		'action_id' => 'example',
	],

	'example/route/with/{string:\w+}' => [
		'controller_id' => 'example',
		'action_id' => 'example',
	],
	
	*/

	'' => [
		'controller_id' => 'login',
		'action_id' => 'index',
	],

	'login/already' => [
		'controller_id' => 'login',
		'action_id' => 'already',
	],

	'login/logout' => [
		'controller_id' => 'login',
		'action_id' => 'logout',
	],

	'language/{value:\w+}' => [
		'controller_id' => 'login',
		'action_id' => 'languageSwitch',
	],

];