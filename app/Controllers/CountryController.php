<?php

declare(strict_types=1);

namespace App\Controllers;

use App\ApiFetcher;
use App\Response;

class CountryController
{
    private ApiFetcher $api;

    public function __construct()
    {
        $this->api = new ApiFetcher();
    }

    public function index(array $vars): Response
    {
        $country = (string)$vars['country'];
        $data = $this->api->headlinesFromApi($country);
        $template = 'News/index';
        $data = ['articles' => $data->getNews()];
        return new Response($template, $data);
    }

}

