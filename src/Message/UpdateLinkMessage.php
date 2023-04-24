<?php

namespace App\Message;

use App\Entity\Link;

final class UpdateLinkMessage
{
    public string $url;
    public string $slug;

    public function __construct(
        public readonly Link $_entity,
    ) {
        $this->url = $this->_entity->getUrl();
        $this->slug = $this->_entity->getSlug();
    }
}