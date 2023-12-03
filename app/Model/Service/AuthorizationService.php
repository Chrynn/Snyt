<?php

declare(strict_types=1);

namespace App\Model\Service;

use Nette\Security\AuthenticationException;
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

	/**
	 * @throws AuthenticationException
	 */
	public function login(string $email, string $password): void
	{
		$this->netteSecurityUser->login($email, $password);
	}
}
