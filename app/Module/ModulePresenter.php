<?php

declare(strict_types=1);

namespace App\Module;

class ModulePresenter extends BasePresenter
{
	public function findLayoutTemplateFile(): ?string
	{
		return __DIR__ . '/templates/@layout.latte';
	}
}
