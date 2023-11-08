<?php

namespace App\Controllers;

use App\ApiFetcher;
use App\Response;


class NewsController
{
    private ApiFetcher $api;

    public function __construct()
    {
        $this->api = new ApiFetcher();
    }

    public function index(): Response
    {
        $data = $this->api->fetchNewsFromApi();
        $template = 'News/index';
        $data = ['articles' => $data->getNews()];
        return new Response($template, $data);
    }

}

