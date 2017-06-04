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
                session()->flash('message', 'Dit artikel is niet gevonden. Probeer de overzichtspagina te herversen met Ctrl+F5 of Ctrl+Shift+R.');

                return redirect('admin/artikels/overzicht');
            }

            return $next($request);
        }
        elseif(strpos($currentURI, 'scholen'))
        {
            $school = School::findOrFail($id);

            if($school == null)
            {
                session()->flash('message', 'Deze school is niet gevonden. Probeer de overzichtspagina te herversen met Ctrl+F5 of Ctrl+Shift+R.');

                return redirect('admin/scholen/overzicht');
            }

            return $next($request);
        }
        elseif(strpos($currentURI, 'links'))
        {
            $link = Link::findOrFail($id);

            if($link == null)
            {
                session()->flash('message', 'Deze link is niet gevonden. Probeer de overzichtspagina te herversen met Ctrl+F5 of Ctrl+Shift+R.');

                return redirect('admin/links/overzicht');
            }

            return $next($request);
        }
        elseif(strpos($currentURI, 'bezienswaardigheden'))
        {
            $sight = Sight::findOrFail($id);

            if($sight == null)
            {
                session()->flash('message', 'Deze bezienswaardigheid is niet gevonden. Probeer de overzichtspagina te herversen met Ctrl+F5 of Ctrl+Shift+R.');

                return redirect('admin/bezienswaardigheden/overzicht');
            }

            return $next($request);
        }

        return $next($request);
    }
}
