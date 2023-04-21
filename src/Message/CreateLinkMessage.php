<?php

namespace App\Message;

use Symfony\Component\Validator\Constraints as Assert;

class CreateLinkMessage
{
    public function __construct(

        #[Assert\Url]
        #[Assert\NotBlank()]
        public ?string $url = null,

        #[Assert\NotBlank()]
        public ?string $slug = null
    )
    {
    }
}
