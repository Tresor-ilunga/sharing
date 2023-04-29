<?php

declare(strict_types=1);

namespace App\Service;

use App\ValueObject\LinkMeta;
use Embed\Embed;
use Throwable;

final class MetaScrapperService
{
    public function getLinkMeta(string $url): ?LinkMeta
    {
        try {
            //$embed = new Embed();
           // $meta = $embed->get($url);

            $meta = (new Embed())->get($url);
            return LinkMeta::fromEmbed($meta);
        } catch (Throwable $e) {
            dd($e);
        }
    }
}