<?php

namespace App\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use GeoIp2\Model\City;

#[ORM\Embeddable]
class Location
{

    private function __construct(
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

    public static function fromGeoIp2(City $data): self
    {
        return new self(
            country: $data->country->name,
            city: $data->city->name,
            time_zone: $data->location->timeZone,
            longitude: $data->location->longitude,
            latitude: $data->location->latitude,
            accuracy_radius: $data->location->accuracyRadius,
        );
    }
}