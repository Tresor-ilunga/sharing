<?php

namespace App\Message;

use App\Entity\Link;

final class DeleteLinkMessage
{
    public function __construct(
        public readonly Link $_entity,
    )
    {
    }
}
