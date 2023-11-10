<?php

namespace App;



use App\Models\News;
use App\Models\NewsCollection;
use Carbon\Carbon;
use GuzzleHttp\Client;

class ApiFetcher
{
    private Client $client;
    private  const API_KEY = 'b72760330e8840a6bffc7e0ca61db724';
    private const API_URL = 'https://newsapi.org/v2/top-headlines?sources=';
    private const API_SOURCE_URL ='https://newsapi.org/v2/top-headlines?country=';

    public function __construct()
    {
        $this->client =new Client();

    }

    public function fetchNewsFromApi(string $source = 'bbc-news'): NewsCollection
    {

        $response = $this->client->get(self::API_URL . $source . '&apiKey=' . self::API_KEY );
        $data = json_decode($response->getBody(), false);

        $collection = new NewsCollection();

        foreach ($data->articles as $result) {
            $author = $result->author;
            $title = $result->title;
            $description = $result->description;
            $url = $result->url;
            $urlToImage = $result->urlToImage;
            $publishedAt = Carbon::parse($result->publishedAt);


            $collection->add(new News($author, $title, $description, $url, $urlToImage, $publishedAt));
        }

        return $collection;
    }

    public function headlinesFromApi(string $source): ?NewsCollection
    {

        $response = $this->client->get(self::API_SOURCE_URL . $source . '&apiKey=' . self::API_KEY );
        $data = json_decode($response->getBody(), false);

        $collection = new NewsCollection();

        foreach ($data->articles as $result) {
            $author = $result->author;
            $title = $result->title;
            $description = $result->description;
            $url = $result->url;
            $urlToImage = $result->urlToImage;
            $publishedAt = Carbon::parse($result->publishedAt);


            $collection->add(new News($author, $title, $description, $url, $urlToImage, $publishedAt));
        }

        return $collection;
    }

    public function searchNewsFromApi(string $query, string $fromDate, string $toDate): ?NewsCollection
    {

        $url = "https://newsapi.org/v2/everything?q={$query}&from={$fromDate}&to={$toDate}&sortBy=popularity&apiKey=" . self::API_KEY;

        $response = $this->client->get($url);
        $data = json_decode($response->getBody(), false);

        $collection = new NewsCollection();

        foreach ($data->articles as $result) {
            $author = $result->author;
            $title = $result->title;
            $description = $result->description;
            $url = $result->url;
            $urlToImage = $result->urlToImage;
            $publishedAt = Carbon::parse($result->publishedAt);

            $collection->add(new News($author, $title, $description, $url, $urlToImage, $publishedAt));
        }

        return $collection;
    }





}

