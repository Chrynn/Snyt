<?php

declare(strict_types=1);

namespace App\Model\Repository;

use App\Model\Mapper\Event;

/**
 * @extends BaseRepository<Event>
 */
class EventRepository extends BaseRepository
{
	public function findAllForPaginator(int $limit, int $offset): array
	{
		$result = $this->dibi->query("
            SELECT * FROM {$this->tableName}
            LIMIT ?
            OFFSET ?
        ",
            $limit,
            $offset
        );

		return $result->fetchAssoc('id');
	}
}
