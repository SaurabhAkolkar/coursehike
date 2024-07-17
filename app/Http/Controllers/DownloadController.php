<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\CourseClass;
use App\CourseResource;

class DownloadController extends Controller
{
    public function getDownload($id){

    	$entry = CourseClass::where('id', '=', $id)->firstOrFail();
    	$pathToFile=public_path()."/files/pdf/".$entry->pdf;
    	return response()->download($pathToFile);

	}


	public function getResourceDownload($id){

    	$entry = CourseResource::where('id', '=', $id)->firstOrFail();
		dd($entry->file_url);
    	return response()->download($entry->file_url);

	}

	
}
