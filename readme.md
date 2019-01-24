# Request Filters

This package is used to allow quick and dynamic filtering of eloquent based models using a simple request argument. Perfect for backend APIs!

## Configuration

To begin using this package in Laravel, you should firstly create a macro for a `request()->filter()` method as shown below:

```php

use CroudTech\RequestFilters\RequestFilters;

request()->macro('filters', function() {
    return RequestFilters::getFilterCollection(
        // Use the 'filters' query param.
        request()->query('filters')
    );
});

```

*Note: For Lumen applications, you'll need a helper file to define the `request()` method as this is not available by default.*

Now within any of your repositories, you can begin filtering the results from that model based on whatever strategy and parameter information was provided within the `filters` query parameter:

```php

public function getFood()
{
    return request()->filters()->apply(
        DB::table('food')
    );
}

```

Now, we can provide a base_64 encoded string containing a JSON strategy for how we wish to filter our food. For example:

```json
[
    {
        "strategy": "where",
        "parameters": [
            "calories",
            ">",
            100
        ]
    },
    {
        "strategy": "whereIn",
        "parameters": [
            "food_type",
            "('fried', 'baked')"
        ]
    }
]
```
