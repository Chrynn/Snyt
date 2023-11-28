<?php

declare(strict_types=1);

namespace App\Model\Repository;

use Dibi\Connection;

abstract class BaseRepository
{
	public function __construct(private Connection $database)
	{
	}

	public function getDibiConnection(): Connection
	{
		return $this->database;
	}
}
