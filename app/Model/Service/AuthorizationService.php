<?php

namespace App\Model\Service;

use Nette\Security\User as NetteSecurityUser;

class AuthorizationService
{
	public function __construct(
		private NetteSecurityUser $netteSecurityUser,
	) {
	}

	public function isLoggedIn(): bool
	{
		return $this->netteSecurityUser->isLoggedIn();
	}
}
