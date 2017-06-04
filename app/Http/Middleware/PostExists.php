<?php

namespace App\Http\Middleware;

use Closure;

use App\Article;
use App\Link;
use App\School;
use App\Sight;

class PostExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentURI = $_SERVER['REQUEST_URI'];
        $id = filter_var($currentURI, FILTER_SANITIZE_NUMBER_INT);

        if(strpos($currentURI, 'artikels'))
        {
            $article = Article::withTrashed()->where('id', $id)->first();

            if($article == null)
            {
                return redirect('admin/artikels/overzicht')->withErrors([
                    'message' => 'Dit artikel is niet gevonden. Mogelijk is het al verwijderd door een admin.'
                    ]);
            }

            return $next($request);
        }
        elseif(strpos($currentURI, 'scholen'))
        {
            $school = School::find($id);

            if($school == null)
            {
                return redirect('admin/scholen/overzicht')->withErrors([
                    'message' => 'Dit artikel is niet gevonden. Mogelijk is het al verwijderd door een admin.'
                    ]);
            }

            return $next($request);
        }
        elseif(strpos($currentURI, 'links'))
        {
            $link = Link::findOrFail($id);

            if($link == null)
            {
                return redirect('admin/links/overzicht')->withErrors([
                    'message' => 'Dit artikel is niet gevonden. Mogelijk is het al verwijderd door een admin.'
                    ]);
            }

            return $next($request);
        }
        elseif(strpos($currentURI, 'bezienswaardigheden'))
        {
            $sight = Sight::findOrFail($id);

            if($sight == null)
            {
                return redirect('admin/bezienswaardigheden/overzicht')->withErrors([
                    'message' => 'Dit artikel is niet gevonden. Mogelijk is het al verwijderd door een admin.'
                    ]);
            }

            return $next($request);
        }

        return $next($request);
    }
}
