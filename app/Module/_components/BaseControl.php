<?php

declare(strict_types=1);

namespace App\Module\_components;

use Nette\Application\UI\Control;
use Nette\Bridges\ApplicationLatte\Template;
use stdClass;

/**
 * @property-read Template|stdClass $template
 */
class BaseControl extends Control
{
}
