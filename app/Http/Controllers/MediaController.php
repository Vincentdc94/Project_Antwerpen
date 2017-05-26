<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Media;

class MediaController extends Controller
{
    public function all(){
      $media = Media::all();

      return response()->json(compact('media'));
    }

    public function store(Request $request){

      $url = 'nofile';
      $type = $request->type;

      if($type == 'link'){
        $url = $request->url;

        if(strpos($url, 'youtube') !== false){
          $type = 'video';
        }
      }else{
        $mediaPath = $request->file->store('public/image/articles');
        $url = str_replace("public/","storage/", $mediaPath);
      }
      
      $media = new Media();

      $media->url = $url;
      $media->type = $type;
      $media->save();

    }

    public function delete(Request $request){
      foreach($request->media as $media){
        Media::find($media["id"])->delete();
      }
    }
}
