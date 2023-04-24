<?php

namespace App\Entity;

use App\Repository\LinkRepository;
use App\ValueObject\LinkMeta;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LinkRepository::class)]
class Link
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\Embedded(class: LinkMeta::class, columnPrefix: 'meta_')]
    private LinkMeta $meta;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $visit_at = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $click_count = null;

    #[ORM\Column]
    private ?int $unique_visit_count = null;

    #[ORM\Column]
    private ?int $total_visit_count = null;

    #[ORM\Column]
    private ?bool $has_automatic_redirect = null;

    #[ORM\Column(nullable: true)]
    private ?int $redirect_delay = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
        $this->meta = LinkMeta::default();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getVisitAt(): ?\DateTimeImmutable
    {
        return $this->visit_at;
    }

    public function setVisitAt(\DateTimeImmutable $visit_at): self
    {
        $this->visit_at = $visit_at;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getClickCount(): ?int
    {
        return $this->click_count;
    }

    public function setClickCount(int $click_count): self
    {
        $this->click_count = $click_count;

        return $this;
    }

    public function getUniqueVisitCount(): ?int
    {
        return $this->unique_visit_count;
    }

    public function setUniqueVisitCount(int $unique_visit_count): self
    {
        $this->unique_visit_count = $unique_visit_count;

        return $this;
    }

    public function getTotalVisitCount(): ?int
    {
        return $this->total_visit_count;
    }

    public function setTotalVisitCount(int $total_visit_count): self
    {
        $this->total_visit_count = $total_visit_count;

        return $this;
    }

    public function isHasAutomaticRedirect(): ?bool
    {
        return $this->has_automatic_redirect;
    }

    public function setHasAutomaticRedirect(bool $has_automatic_redirect): self
    {
        $this->has_automatic_redirect = $has_automatic_redirect;

        return $this;
    }

    public function getRedirectDelay(): ?int
    {
        return $this->redirect_delay;
    }

    public function setRedirectDelay(?int $redirect_delay): self
    {
        $this->redirect_delay = $redirect_delay;

        return $this;
    }

    public function getMeta(): LinkMeta
    {
        return $this->meta;
    }

    public function setMeta(LinkMeta $meta): self
    {
        $this->meta = $meta;

        return $this;
    }
}