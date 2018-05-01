<?php

namespace MatthewErskine\RequestFilters;

use Illuminate\Support\Collection;

class FilterCollection extends Collection
{
    /**
     * Applies all of the filters in the collection to a query.
     *
     * @param  \Illuminate\Database\Eloquent\QueryBuilder $query
     * @return \Illuminate\Database\Eloquent\QueryBuilder
     */
    public function apply($query)
    {
        return tap($query, function($query) {
            $this->each->apply($query);
        });
    }
}
