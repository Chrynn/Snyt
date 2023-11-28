<?php

declare(strict_types=1);

namespace App\Model\Repository;

class EventRepository extends BaseRepository
{
	private const TABLE = 'event';

	public function findAll(): array
	{
		$result = $this->getDibiConnection()
			->select('*')
			->from(self::TABLE);

		return $result->fetchAssoc('id');
	}

	public function getAllCount(): int
	{
		$result = $this->getDibiConnection()
			->select('COUNT(id)')
			->from(self::TABLE);

		return $result->fetchSingle();
	}

	public function findAllForPaginator(int $limit, int $offset): array
	{
		$result = $this->getDibiConnection()
			->select('*')
			->from(self::TABLE)
			->limit($limit)
			->offset($offset);

		return $result->fetchAssoc('id');
	}
}
