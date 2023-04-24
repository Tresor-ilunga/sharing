<?php

namespace App\Message;

use Symfony\Component\Validator\Constraints as Assert;

class CreateLinkMessage
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Url]
        public ?string $url = null,

        #[Assert\NotBlank]
        public ?string $slug = null,
    ) {
    }
}