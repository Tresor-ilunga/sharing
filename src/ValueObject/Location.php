<?php

namespace App\ValueObject;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class Location
{

    public function __construct(
        #[ORM\Column(length: 255, nullable: true)]
        public readonly ?string $country = null,
        #[ORM\Column(length: 255, nullable: true)]
        public readonly ?string $city = null,
        #[ORM\Column(length: 255, nullable: true)]
        public readonly ?string $time_zone = null,
        #[ORM\Column(type: 'float', nullable: true)]
        public readonly ?float $longitude = null,
        #[ORM\Column(type: 'float', nullable: true)]
        public readonly ?float $latitude = null,
        #[ORM\Column(type: 'integer', nullable: true)]
        public readonly ?int $accuracy_radius = null,
    ){}
}