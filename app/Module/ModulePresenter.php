<?php

declare(strict_types=1);

namespace App\Module;

use Nette\Application\UI\Presenter;

class ModulePresenter extends Presenter
{
	public function findLayoutTemplateFile(): ?string
	{
		return __DIR__ . '/templates/@layout.latte';
	}
}
