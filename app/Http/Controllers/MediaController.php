<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Media;

class MediaController extends Controller
{
    public function store(Request $request){
      $mediaPath = $request->image->store('public/image/articles');
      
      $avatarPath = str_replace("public/","storage/", $mediaPath);

      $media = new Media();

      $media->type = 'image';
      $media->url = $avatarPath;

      $media->save();

      $articleMedia = new ArticleMedia();

      $articleMedia->media_id = $media->id;
      $articleMedia->article_id = ;
    }

    public function delete(Request $request){

    }
}
