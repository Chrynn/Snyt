<?php

declare(strict_types=1);

namespace App\Model\Repository;

use Dibi\Row;

class UserRepository extends BaseRepository
{
	public function findOneBy(string $key, mixed $value): Row|null
	{
		$result = $this->dibi->query(
			"SELECT * FROM user WHERE {$key}=?",
			$value
		);

		return $result->fetch();
	}
}