<?php

declare(strict_types=1);

namespace App\Service;

use App\ValueObject\LinkMeta;
use Embed\Embed;

final class MetaScrapperService
{
    public function getLinkMeta(string $url): ?LinkMeta
    {
        try {

            $meta = (new Embed())->get($url);

            return LinkMeta::fromEmbed($meta);
        }catch (\Throwable $e) {
            dd($e);
        }
    }
}