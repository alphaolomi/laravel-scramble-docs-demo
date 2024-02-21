<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationsController
{
    public function update(Request $request, Location $location)
    {
        $request->validate([
            /**
             * The location coordinates.
             * @var array{lat: float, long: float}
             * @example {"lat": 50.450001, "long": 30.523333}
             */
            'coordinates' => 'array',
        ]);
    }
}
