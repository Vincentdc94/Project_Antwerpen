<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Media;

class MediaController extends Controller
{
    public function upload(Request $request){
      $mediaPath = $request->image->store('public/image/articles');
      
      $avatarPath = str_replace("public/","storage/", $mediaPath);

      $media = new Media();

      $media->type = 'image';
      $media->url = $avatarPath;

      $media->save();
    }
}
