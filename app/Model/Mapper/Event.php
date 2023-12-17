<?php

declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\Mapper\Trait\CreatedAt;
use App\Model\Mapper\Trait\EditedAt;
use DateTime;

class Event extends BaseListTable
{
    use CreatedAt;
    use EditedAt;

    public string $title;

    public DateTime|null $event_time;

    public string|null $event_place;
}
