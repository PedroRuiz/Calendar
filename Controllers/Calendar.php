<?php

namespace Calendar\Controllers;

use App\Controllers\BaseController;

class Calendar extends BaseController
{
  public function index()
  {
    return view('Calendar\Views\index',[
      'lang'                          => service('request')->getLocale(),
      'calendarModuleMenuOpen'        => true,
      'calendarModuleCalendarActive'  => true,
      'content'                       => $this->request->getPost('editor1') ?? null,      
      'hiden' => [
        'id'      => $document['id'] ?? '',
        'title'   => $document['docname'] ?? '',
      ]
    ]);
  }
}