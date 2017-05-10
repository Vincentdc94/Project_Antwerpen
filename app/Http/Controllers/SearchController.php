<?php

namespace App\Http\Controllers;
use App\Article;
use App\Field;
use App\Link;
use App\School;
use App\Sight;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class SearchController extends Controller
{
    public function searchAll(Request $request)
    {
    	//dd(request()->all());

    	$searchQuery = request('searchtext');

    	$articleMatches		= Article::search($searchQuery)->get();
    	$fieldMatches		= Field::search($searchQuery)->get();
    	$linkMatches 		= Link::search($searchQuery)->get();
    	$schoolMatches		= School::search($searchQuery)->get();
    	$sightMatches		= Sight::search($searchQuery)->get();

    	$matches = new Collection();
    	$matches = $matches->merge($articleMatches);
    	$matches = $matches->merge($fieldMatches);
    	$matches = $matches->merge($linkMatches);
    	$matches = $matches->merge($schoolMatches);
    	$matches = $matches->merge($sightMatches);

    	return $matches;
   	}
}
