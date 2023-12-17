<?php

declare(strict_types=1);

namespace App\Module;

use App\Model\Factory\LoginFactory;
use App\Model\Service\AuthorizationService;
use App\Module\components\Login\LoginControl;
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

	protected function createComponentLogin(): LoginControl
	{
		return $this->loginFactory->create();
	}

	public function findLayoutTemplateFile(): ?string
	{
		return __DIR__ . '/templates/@layout.latte';
	}
}
