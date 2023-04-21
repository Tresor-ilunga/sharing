<?php

namespace App\MessageHandler;

use App\Message\DeleteLinkMessage;
use App\Repository\LinkRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class DeleteLinkMessageHandler
{
    public function __construct(
        private readonly LinkRepository $linkRepository
    )
    {}

    public function __invoke(DeleteLinkMessage $message): void
    {
        $this->linkRepository->remove($message->_entity);
    }
}
