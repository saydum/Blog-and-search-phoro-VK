<?php
 // Асоциативный массив с конфиг данными
return [
	'connect' => [
		'connection' => 'mysql:host=localhost',
		'dbname' => 'level_3',
		'username' => 'roots',
		'password' => 'passwords',

	],
	'validation' => [
        'username:User' => 'required | maxlength(15) | minlength(3)',
        'email:Email' => 'required',
        'password:Pass' => 'required | maxlength(25) | minlength(8)'
    ]
];