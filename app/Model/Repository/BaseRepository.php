<?php

declare(strict_types=1);

namespace App\Model\Repository;

use Dibi\Connection;
use Dibi\Row;
use ReflectionClass;

/**
 * @template T of Row
 */
abstract class BaseRepository
{
    protected string $tableName;

	public function __construct(
		protected Connection $dibi
	) {
        $reflect = new ReflectionClass($this);
        $repositoryName = str_replace('Repository', '', $reflect->getShortName());

        $this->tableName = strtolower($repositoryName);
	}

    /**
     * @return T
     */
    public function find(mixed $id): Row|null
    {
        $result = $this->dibi->query("
            SELECT * FROM {$this->tableName} WHERE id=?
        ",
            $id
        );

        return $result->fetch();
    }

    /**
     * @return T
     */
    public function findOneBy(array $criteria, array|null $orderBy = null): Row|null
    {
        $query = "SELECT * FROM {$this->tableName} WHERE %and";

        if ($orderBy) {
            $query = $query . " ORDER BY %by";
        }

        $arguments = [
            $query,
            $criteria
        ];

        if ($orderBy) {
            $arguments[] = $orderBy;
        }

        $result = $this->dibi->query(...$arguments);

        return $result->fetch();
    }

    /**
     * @return array<array-key, T>
     */
    public function findAll(): array
    {
        $result = $this->dibi->query("
            SELECT * FROM {$this->tableName}
        ");

        return $result->fetchAll();
    }

    public function getAllCount(): int
    {
        $result = $this->dibi->query("
            SELECT * FROM {$this->tableName}
        ");

        return $result->getRowCount();
    }
}
