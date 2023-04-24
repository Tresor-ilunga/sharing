<?php

namespace App\MessageHandler;

use App\Message\UpdateLinkMessage;
use App\Repository\LinkRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class UpdateLinkMessageHandler
{
    public function __construct(
        private readonly LinkRepository $repository
    ) {
    }

    public function __invoke(UpdateLinkMessage $message): void
    {
        $link = $message->_entity;
        $link
            ->setUrl($message->url)
            ->setSlug($message->slug);

        $this->repository->save($link, true);
    }
}