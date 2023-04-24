<?php

declare(strict_types=1);

namespace App\ValueObject;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class LinkMeta
{
   private function __construct(
       #[ORM\Column(length: 255)]
       public readonly ?string $title = null,
       #[ORM\Column(type: 'text', length: 255, nullable: true)]
       public readonly ?string $description = null,
       #[ORM\Column(length: 255)]
       public readonly ?string $canonical_url = null,
       #[ORM\Column(length: 255, nullable: true)]
       public readonly ?string $image = null,
       #[ORM\Column(length: 255, nullable: true)]
       public readonly ?string $favicon = null
   ){}

    public static function default(): self
    {
        return new self();
    }
}