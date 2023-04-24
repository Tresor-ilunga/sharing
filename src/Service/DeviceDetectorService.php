<?php

declare(strict_types=1);

namespace App\Service;

use App\ValueObject\Device;
use DeviceDetector\ClientHints;
use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Client\Browser;
use DeviceDetector\Parser\OperatingSystem;

final class DeviceDetectorService
{
    public function getDevice(string $user_agent, array $server): Device
    {
        $dd = new DeviceDetector($user_agent, ClientHints::factory($server));
        $dd->parse();

        $data = [
            'os' => (string) OperatingSystem::getOsFamily($dd->getOs('name')),
            'client' => strval(match (true) {
                $dd->isBrowser() => Browser::getBrowserFamily(strval($dd->getClient('name'))),
                default => $dd->getclient('name'),
            }),
            'device' => $dd->getDeviceName(),
            'is_bot' => $dd->isBot(),
        ];

        return Device::fromArray($data);
    }
}