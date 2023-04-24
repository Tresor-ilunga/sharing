<?php

namespace App\MessageHandler;

use App\Entity\Link;
use App\Message\CreateLinkMessage;
use App\Repository\LinkRepository;
use App\Service\MetaScrapperService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CreateLinkMessageHandler
{
    public function __construct(
        private readonly LinkRepository $repository,
        private readonly MetaScrapperService $service
    ) {
    }

    public function __invoke(CreateLinkMessage $message): void
    {
        $link = (new Link())
            ->setUrl($message->url)
            ->setSlug($message->slug)
            ->setMeta($this->service->getLinkMeta($message->url))
        ;

        // traitements supplémentaires
        $this->repository->save($link, true);
    }
}
