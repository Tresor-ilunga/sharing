<?php

declare(strict_types=1);

namespace App\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use Webmozart\Assert\Assert;

#[ORM\Embeddable]
class Device
{

    public function __construct(
        #[ORM\Column(length: 255, nullable: true)]
        public readonly ?string $operating_system = null,
        #[ORM\Column(length: 255, nullable: true)]
        public readonly ?string $client = null,
        #[ORM\Column(length: 255, nullable: true)]
        public readonly ?string $device = null,
        #[ORM\Column(type: 'boolean', options: ['default' => false])]
        public readonly bool    $is_bot = false,
    ){
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['operating_system'] ?? null,
            $data['client'],
            $data['device'],
            $data['is_bot'],
        );
    }
}