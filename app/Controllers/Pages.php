<?php

/* namespace used to organize classes and function within controller 
   directory of the App namespace */
namespace App\Controllers;

// Add this line to import the class 'PageNotFoundException' in view method
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view(string $page = 'home')
    {
      // Check if the file exist in Views/pages
      // If not it will display page not found
      if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
          // Whoops, we don't have a page for that!
          throw new PageNotFoundException($page);
      }
      
      // Assign $page value to $title
      $data['title'] = ucfirst($page); // Capitalize the first letter
      
      // Used "." to concatenate main page view including header and footer view
      return view('templates/header', $data). view('pages/' . $page). view('templates/footer');
    }
}