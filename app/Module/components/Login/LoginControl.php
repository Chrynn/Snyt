<?php

namespace App\Module\components\Login;

use App\Model\Service\AuthorizationService;
use App\Module\components\BaseControl;
use Nette\Application\UI\Form;
use Nette\Neon\Exception;
use Nette\Security\AuthenticationException;

class LoginControl extends BaseControl
{
	public function __construct(
		protected AuthorizationService $authorizationService
	) {
	}

	protected function createComponentForm(): Form
	{
		$form = new Form();
		$form->addEmail('email')->setRequired();
		$form->addPassword('password')->setRequired('test');
        $form->addSubmit('submit');
		$form->onSubmit[] = [$this, 'actionLogin'];

		return $form;
	}

	public function actionLogin(Form $form): void
	{
        if ($this->presenter->isAjax() === true) {
            try {
                $values = $form->getValues();
                $this->authorizationService->login($values->email, $values->password);

                $this->flashMessage('LoginControl was successful');
                $this->redirect('Profile:');
            } catch (AuthenticationException $e) {
                $form->addError($e->getMessage());
                $this->redrawControl("login");
            }
        }
	}

	public function render(): void
	{
		$this->template->setFile(__DIR__ . '/templates/login.latte');
		$this->template->render();
	}
}
