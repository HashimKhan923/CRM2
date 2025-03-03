<?php

namespace App\Services;

class GeolocationService
{
    public function isWithinRadius($lat1, $lon1, $lat2, $lon2, $radius)
    {
        $earthRadius = 6371000; // Radius of the Earth in meters

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;

        return $distance <= $radius;
    }
}
