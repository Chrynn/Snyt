<?php

namespace App\Module\_components\Login;

use App\Module\_components\BaseControl;
use Nette\Application\UI\Form;

class Login extends BaseControl
{
	protected function createComponentForm(): Form
	{
		$form = new Form();
		$form->addText("email");
		$form->addPassword("password");

		return $form;
	}

	public function render(): void
	{
		$this->template->setFile(__DIR__ . '/templates/login.latte');
		$this->template->render();
	}
}
