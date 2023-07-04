<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ByTitle
{
    public function __construct(protected Request $request)
    {
        //
    }

    public function handle(Builder $builder, \Closure $next)
    {
        return $next($builder)
            ->when(
                $this->request->has('title'),
                fn ($query) => $query->where('title', 'REGEXP', $this->request->title)
            );
    }
}
