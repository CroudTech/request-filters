<?php

use Mockery as m;
use PHPUnit\Framework\TestCase;
use MatthewErskine\RequestFilters\RequestFilters;

class FeatureTest extends TestCase
{
    public function test_it_can_build_a_filter_collection()
    {
        $query = [
            [
                'strategy' => 'where',
                'parameters' => ['foo', '=', 'bar'],
            ],
        ];

        $filterCollection = RequestFilters::getFilterCollection(
            base64_encode(json_encode($query))
        );

        $this->assertCount(1, $filterCollection);

        $query = m::mock(Stdclass::class);
        $query->shouldReceive('where')->once()->with('foo', '=', 'bar');

        $filterCollection->first()->apply($query);
    }
}
