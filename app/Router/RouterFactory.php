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
		$routerClient = new RouteList("Profile");
		$routerClient->addRoute('profile/<presenter>/<action>[/<id>]', 'Home:default');

		$routerUser = new RouteList("User");
		$routerUser->addRoute('<presenter>/<action>[/<id>]', 'Home:default');

		$router = new RouteList();
		$router->add($routerClient);
		$router->add($routerUser);

		return $router;
	}
}
