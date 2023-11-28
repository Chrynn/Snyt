<?php

declare(strict_types=1);

namespace App\Model\Factory;

use App\Module\_components\Login\Login;

interface LoginFactory
{
	public function create(): Login;
}
