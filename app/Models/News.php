<?php

namespace App\Models;

use Carbon\Carbon;

class News
{
    private ?string $author;
    private ?string $title;
    private ?string $description;
    private ?string $url;
    private ?string $urlToImage;
    private ?Carbon $publishedAt;



    public function __construct
    (
        ?String $author,
        ?string $title,
        ?string $description,
        ?string $url,
        ?string $urlToImage,
        ?Carbon $publishedAt
    )
    {

        $this->author = $author;
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->urlToImage = $urlToImage;
        $this->publishedAt = $publishedAt;
    }

    public function getAuthor(): string
    {
        if ($this->author) {
            return $this->author;
        } else {
            return ' ';
        }
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        if ($this->description) {
            return $this->description;
        } else {
            return ' ';
        }
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getUrlToImage(): string
    {
        if ($this->urlToImage) {
            return $this->urlToImage;
        } else {
            return 'https://100.mak.ac.ug/wp-content/uploads/2022/09/news.jpg';
        }
    }

    public function getPublishedAt(): Carbon
    {
        return $this->publishedAt;
    }


}




