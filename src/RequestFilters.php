<?php

namespace CroudTech\RequestFilters;

class RequestFilters
{
    /**
     * Gets a filter collection for the given encoded query string.
     *
     * @param  string $query
     * @return \CroudTech\RequestFilters\FilterCollection
     */
    public static function getFilterCollection($query)
    {
        $filters = json_decode(base64_decode($query), true);

        return (new FilterCollection($filters))->map(function($filter) {
            return new Filter($filter['strategy'], $filter['parameters']);
        });
    }
}
