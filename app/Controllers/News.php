<?php

namespace App\Controllers;
use App\Models\NewsModel; // Declare model that we want to use
use CodeIgniter\Exceptions\PageNotFoundException;

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
  // This method was used to display individual news item
  public function show(?string $slug=null) {
    // Create $model as an instance to NewsModel class
    $model = model(NewsModel::class);

    // Retrieve data and assign news as its variable name
    $data['news'] = $model->getNews($slug);

    // Check if data is null
    if ($data['news']==null) {
      throw new PageNotFoundException('Cannot find the new item: '.$slug);
    }

    $data['title'] = $data['news']['title'];

    return view('templates/header',$data).view('news/view').view('templates/footer');
  }

  // Method to display the HTML form
  public function new() {

    // Load form helper to display the form using helper() function
    helper('form');

    return view('templates/header',['title'=>'Create a news item'])
           .view('news/create')
           .view('templates/footer');
  }

  // Method to submit data
  public function create() {
    // Load form helper
    helper('form');
    
    // Retrieve data sent via "post" request of the value name attribute is equal to "title" and "body"
    $data = $this->request->getPost(['title', 'body']);

    // Checks whether the submitted data passed the validation rules.
    // validateData(): Controller-provided helper function
    if (! $this->validateData($data, [
        'title' => 'required|max_length[255]|min_length[3]',
        'body'  => 'required|max_length[5000]|min_length[10]',
    ])) {
        // The validation fails, so returns the form.
        return $this->new();
    }

    // Gets the validated data and set them in the $post variable.
    $post = $this->validator->getValidated();

    // Load/call NewsModel
    $model = model(NewsModel::class);

    // Save data(using save() method) to the database using the NewsModel class
    $model->save([
        'title' => $post['title'],
        //url_title(function provided by the URL helper) used to generate slug
        // Replace spaces in the title with '-'. 
        // 'true' used to ensure all string in a lowercase.
        'slug'  => url_title($post['title'], '-', true),
        'body'  => $post['body'],
    ]);

    return view('templates/header', ['title' => 'Create a news item'])
        . view('news/success')
        . view('templates/footer');
  }


}