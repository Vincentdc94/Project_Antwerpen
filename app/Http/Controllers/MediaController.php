<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Media;

class MediaController extends Controller
{
    public function upload(Request $request){
      $mediaPath = $request->image->store('images/articles');

      $media = new Media();

      $media->type = 'image';
      $media->url = $mediaPath;

      $media->save();
    }
}
