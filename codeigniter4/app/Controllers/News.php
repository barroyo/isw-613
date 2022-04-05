<?php

namespace App\Controllers;

class News extends BaseController
{
    public function index()
    {
      // Create a new class manually
        $newsModel = new \App\Models\NewsSource();
        $news = $newsModel->findAll();
        $data['pageTitle'] = 'News Index';
        $data['showLogo'] = true;
        $content = view('news/index');
        return parent::renderTemplate($content, $data);
    }

    public function new()
    {
        $data['pageTitle'] = 'News Create';
        $data['showLogo'] = false;
        $content = view('news/new');
        return parent::renderTemplate($content, $data);
    }

    public function save()
    {
        //save to the database
        //
    }

}
