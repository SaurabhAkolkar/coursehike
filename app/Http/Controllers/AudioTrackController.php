<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AudioTrack;
use Illuminate\Support\Facades\Storage;

class AudioTrackController extends Controller
{
    public function post(Request $request,$id)
    {
    	if($request->has('name')){
            foreach($request->file('name') as $key=> $file)
            {
                $file_name = basename(Storage::putFile(config('path.course.audio_tracks'). $id, $file , 'private'));
               
                $form= new AudioTrack();
                $form->audio_lang = $request->audio_lang[$key];
                $form->file_url=$file_name;
                $form->c_id = $id;
                $form->save(); 
            }
        }

        return back()->with('success','AudioTrack added !');
    }

    public function delete($id)
    {
    	$record = AudioTrack::findorfail($id);
    	if($record->file_url !="")
        {
            $exists = Storage::exists(config('path.course.audio_tracks'). $record->c_id .'/'. $record->file_url);
            if ($exists)
                Storage::delete(config('path.course.audio_tracks'). $record->c_id .'/'. $record->file_url);
        }
         
    	$record->delete();

    	return back()->with('deleted','AudioTrack has been deleted !');
    }
}
