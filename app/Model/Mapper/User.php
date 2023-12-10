<?php

declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\Mapper\Trait\CreatedAt;
use App\Model\Mapper\Trait\EditedAt;

class User extends BaseListTable
{
    use CreatedAt;
    use EditedAt;

    public string $email;

    public string $password;
}
