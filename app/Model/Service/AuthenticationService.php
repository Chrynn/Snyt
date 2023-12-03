<?php

declare(strict_types=1);

namespace App\Model\Service;

use App\Model\Repository\UserRepository;
use Nette\Security\AuthenticationException;
use Nette\Security\Authenticator;
use Nette\Security\Passwords;
use Nette\Security\SimpleIdentity;

class AuthenticationService implements Authenticator
{
	public function __construct(
		protected Passwords $passwords,
		protected UserRepository $userRepository
	) {}


	/**
	 * @throws AuthenticationException
	 */
	public function authenticate(string $user, string $password): SimpleIdentity
	{
		$user = $this->userRepository->findOneBy('email', $user);

		if (!$user) {
			throw new AuthenticationException('Uzivatel nebyl nalezen');
		}
		if (!$this->passwords->verify($password, $user->password)) {
			throw new AuthenticationException('Nepsravne heslo');
		}

		return new SimpleIdentity(
			$user->id,
			null,
			[
				'email' => $user->email
			]
		);
	}
}