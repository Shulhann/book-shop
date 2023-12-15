<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Katalog | Book Shop',
        ];
        return view('pages/katalog', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About | Book Shop',
        ];
        return view('pages/about', $data);
    }
}
