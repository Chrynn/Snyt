<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;

final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$routerAdmin = new RouteList("Admin");
		$routerAdmin->addRoute('admin/<presenter>/<action>[/<id>]', 'Home:default');

		$routerClient = new RouteList("Client");
		$routerClient->addRoute('client/<presenter>/<action>[/<id>]', 'Home:default');

		$routerUser = new RouteList("User");
		$routerUser->addRoute('<presenter>/<action>[/<id>]', 'Home:default');

		$router = new RouteList();
		$router->add($routerAdmin);
		$router->add($routerClient);
		$router->add($routerUser);

		return $router;
	}
}
