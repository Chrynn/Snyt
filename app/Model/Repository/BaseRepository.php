<?php

declare(strict_types=1);

namespace App\Model\Repository;

use Dibi\Connection;

abstract class BaseRepository
{
	public function __construct(
		protected Connection $dibi
	) {
	}
}
