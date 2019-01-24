<?php

namespace CroudTech\RequestFilters;

class Filter
{
    /**
     * The strategy to filter by.
     *
     * @var string
     */
    protected $strategy;

    /**
     * Any parameters to use in the strategy.
     *
     * @var array
     */
    protected $parameters;

    /**
     * Called when the class should load.
     *
     * @param string $strategy
     * @param array $parameters
     */
    public function __construct($strategy, $parameters = [])
    {
        $this->strategy = $strategy;
        $this->parameters = $parameters;
    }

    /**
     * Applies the filter to a query.
     *
     * @param  \Illuminate\Database\Eloquent\QueryBuilder $query
     * @return void
     */
    public function apply($query)
    {
        $query->{$this->strategy}(...$this->parameters);
    }
}
