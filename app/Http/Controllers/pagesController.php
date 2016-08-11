<?php

namespace App\Http\Controllers;

use App\Http\Controllers\logicController;
use Illuminate\Http\Request;
use App\Http\Requests;

class pagesController extends Controller
{
    // First page
    public function index()
    {
        return view('index');
    }
    public function file(Request $request)
    {
      $logic = new logicController();
      $json = $logic->toReadableJSON($logic->generateJSON($request->sourcecode));

      return response(view('file')->with(compact('json')))->header('Content-Type', "text/calendar");
    }
}
