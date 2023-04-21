<?php

namespace App\MessageHandler;

use App\Entity\Link;
use App\Message\CreateLinkMessage;
use App\Repository\LinkRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CreateLinkMessageHandler
{
    public function __construct(
        private readonly LinkRepository $linkRepository
    )
    {
    }

    public function __invoke(CreateLinkMessage $message): void
    {
        $link = (new Link())
            ->setUrl($message->url)
            ->setSlug($message->slug);

        $this->linkRepository->save($link, true);
    }
}
