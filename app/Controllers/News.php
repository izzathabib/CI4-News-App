<?php

namespace App\Controllers;
use App\Models\NewsModel; // Declare model that we want to use

class News extends BaseController {

  public function index() {

    // Create instance for NewsModel class named model
    // Using helper function: model()
    // The other way: $model = new NewsModel();
    $model = model(NewsModel::class);

    // Retrieve data from model
    $data = [
      'news_list' => $model->getNews(),
      'title' => 'News archive',
    ];
    
    // Call view
    return view('templates/header',$data).view('news/index').view('templates/footer');
  }

  // $slug is set to null to make it an optional.
  // The method does not necessarily being called with slug
  public function show(?string $slug=null) {
    $model = model(NewsModel::class);
    $data['news'] = $model->getNews($slug);
  }
}