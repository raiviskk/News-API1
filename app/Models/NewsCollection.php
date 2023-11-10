<?php

declare(strict_types=1);

namespace App\Models;

class NewsCollection
{
    private array $news = [];

    public function add(News $news): void
    {
        $this->news[] = $news;
    }

    public function getNews(): array
    {
        return $this->news;
    }

}