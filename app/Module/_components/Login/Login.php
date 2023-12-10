<?php

namespace App\Module\_components\Login;

use App\Model\Service\AuthorizationService;
use App\Module\_components\BaseControl;
use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;

class Login extends BaseControl
{
	public function __construct(
		protected AuthorizationService $authorizationService
	) {
	}

	protected function createComponentForm(): Form
	{
		$form = new Form();
		$form->addEmail("email")->setRequired();
		$form->addPassword("password")->setRequired();
		$form->onSubmit[] = [$this, "handleLogin"];

		return $form;
	}

	public function handleLogin(Form $form): void
	{
		try {
			$values = $form->getValues();
			$this->authorizationService->login($values->email, $values->password);

            $this->flashMessage('Login was successful');
            $this->redirect('Profile:');
		} catch (AuthenticationException $e) {
			$form->addError($e->getMessage());
            $this->redrawControl("login");
		}
	}

	public function render(): void
	{
		$this->template->setFile(__DIR__ . '/templates/login.latte');
		$this->template->render();
	}
}
