<?php

namespace App\Controllers;

use App\ApiFetcher;
use App\Response;


class SearchController
{
    private ApiFetcher $api;

    public function __construct()
    {
        $this->api = new ApiFetcher();
    }

    public function index(): Response
    {
        $queryParameters = $_GET;
        $query = $queryParameters['what'] ?? '';
        $fromDate = $queryParameters['from'] ?? '';
        $toDate = $queryParameters['till'] ?? '';

        $data = $this->api->searchNewsFromApi($query, $fromDate, $toDate);
        $template = 'news/index';
        $data = ['articles' => $data->getNews()];
        return new Response($template, $data);
    }

}

