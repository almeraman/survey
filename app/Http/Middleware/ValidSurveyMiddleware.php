<?php

namespace App\Http\Middleware;

use App\Survey;
use Closure;

class ValidSurveyMiddleware
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
        if(Survey::find($request->survey_id)){
            if(Survey::find($request->survey_id)->public){
                return $next($request);
            }
            return redirect()->route('not_valid');
        }
        return redirect()->route('not_valid');
    }
}
