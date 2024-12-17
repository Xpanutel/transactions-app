<?php
	use \Core\Route;
	
	return [
		new Route('/reg', 'user', 'create'),
		new Route('/login', 'user', 'login'),
		new Route('/profile', 'user', 'profile'),
		new Route('/crypto', 'crypto', 'index'),
		new Route('/buy', 'transaction', 'add'),
		new Route('/balance', 'user', 'balance'),
	];
	
