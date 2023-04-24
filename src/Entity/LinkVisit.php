<?php

namespace App\Entity;

use App\Repository\LinkVisitRepository;
use App\ValueObject\Device;
use App\ValueObject\Location;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LinkVisitRepository::class)]
class LinkVisit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Link $link = null;

    #[ORM\Column(length: 255)]
    private ?string $ip = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $user_agent = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $referer = null;

    #[ORM\Embedded(class: Location::class, columnPrefix: 'location_')]
    private Location $location;

    #[ORM\Embedded(class: Device::class, columnPrefix: 'device_')]
    private Device $device;

    public function __construct()
    {
        $this->device = new Device();
        $this->location = new Location();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?Link
    {
        return $this->link;
    }

    public function setLink(?Link $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->user_agent;
    }

    public function setUserAgent(?string $user_agent): self
    {
        $this->user_agent = $user_agent;

        return $this;
    }

    public function getReferer(): ?string
    {
        return $this->referer;
    }

    public function setReferer(?string $referer): self
    {
        $this->referer = $referer;

        return $this;
    }
}