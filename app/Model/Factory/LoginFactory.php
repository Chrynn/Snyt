<?php

declare(strict_types=1);

namespace App\Model\Factory;

use App\Module\components\Login\LoginControl;

interface LoginFactory
{
	public function create(): LoginControl;
}
