<?php
	use \Core\Route;
	
	return [
		new Route('/hello', 'hello', 'index'), // роут для приветственной страницы, можно удалить
		new Route('/reg', 'user', 'create'),
		new Route('/login', 'user', 'login'),
		new Route('/crypto', 'crypto', 'index'),
	];
	
