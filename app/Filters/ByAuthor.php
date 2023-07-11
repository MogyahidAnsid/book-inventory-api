<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ByAuthor
{
    public function handle(Builder $builder, \Closure $next)
    {
        return $next($builder)
            ->when(
                request()->has('relationship_here'),
            );
    }
}
