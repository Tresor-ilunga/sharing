<?php

declare(strict_types=1);

namespace App\Service;


use App\ValueObject\Location;
use GeoIp2\Database\Reader;
use Throwable;

final class IpAddressLocationService
{
    public function __construct(
        private readonly string $projectDir
    )
    {}

    public function getLocation(string $ip): ?Location
    {
        try {
            $data = (new Reader(sprintf('%s/data/geoip_city.mmdb', $this->projectDir)))->city($ip);

            return Location::fromGeoIp2($data);

        }catch (Throwable) {
            return null;
        }
    }
}