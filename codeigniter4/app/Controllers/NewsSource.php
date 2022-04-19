<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class NewsSource extends BaseController
{
    public function index()
    {
      $newsModel = new \App\Models\NewsSource();
      $news = $newsModel->findAll();
      $data['pageTitle'] = 'News Index';
      $data['showLogo'] = true;
      $data['newssources'] = $news;
      $content = view('newssources/index', $data);
      return parent::renderTemplate($content, $data);
    }

    public function new()
    {
      $data['pageTitle'] = 'News Source Create';
      $data['showLogo'] = false;
      $content = view('newssources/new');
      return parent::renderTemplate($content, $data);
    }

    public function save()
    {
      $newsModel = new \App\Models\NewsSource();

      $data = [
        'title' => $this->request->getVar('title'),
        'url'    => $this->request->getVar('url'),
      ];

      $newsModel->save($data);
      return redirect()->to('/newssource');
    }
}
