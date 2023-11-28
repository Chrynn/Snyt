<?php

declare(strict_types=1);

namespace App\Module;

use App\Model\Factory\LoginFactory;
use App\Model\Service\AuthorizationService;
use App\Module\_components\Login\Login;
use Nette\Application\UI\Presenter;
use Nette\Bridges\ApplicationLatte\Template;
use stdClass;

/**
 * @property-read Template|stdClass $template
 */
class BasePresenter extends Presenter
{
	public function __construct(
		private AuthorizationService $authorizationService,
		private LoginFactory $loginFactory
	)
	{
		parent::__construct();
	}

	protected function beforeRender(): void
	{
		$this->template->isLogged = $this->authorizationService->isLoggedIn();
	}

	protected function createComponentLogin(): Login
	{
		return $this->loginFactory->create();
	}

	public function findLayoutTemplateFile(): ?string
	{
		return __DIR__ . '/_templates/@layout.latte';
	}
}
