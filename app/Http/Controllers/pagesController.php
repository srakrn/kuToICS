<?php

namespace App\Http\Controllers;

use App\Http\Controllers\logicController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use View;
use Storage;
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
		$logic = new logiccontroller();
		$json = $logic->toreadablejson($logic->generatejson($request->sourcecode));
		if($request->noclassid==true)
		{
			$json = $logic->removesubjectcode($json);
		}
		$processed_ics = (string) view::make('file', compact('json'));
		Storage::disk('local')->put('timetable.ics', $processed_ics);
		return response()->download(storage_path('app/timetable.ics'));
		// return $processed_ics;
		// return response(view('file')->with(compact('json')))->header('content-type', "text/calendar");
    }
}
