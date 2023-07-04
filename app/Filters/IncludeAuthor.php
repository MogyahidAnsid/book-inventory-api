<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IncludeAuthor
{
    public function handle(Builder $builder, \Closure $next, $relationship)
    {
        if (request()->query('includeAuthor')) {
            $builder->with($relationship);
        }

        return $next($builder);
    }
}
