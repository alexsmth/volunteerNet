<?php

class SharedController extends BaseController {
    /* calculates the distance between two points in miles
     * @ars double, double, double, double @return double
     */
    public function calcDistance($lon1, $lon2, $lat1, $lat2) {
        $ratio = acos(sin($lat1)*sin($lat2)+cos($lat1)*cos($lat2)*cos($lon1-$lon2));
        $distance = $ratio * 60;
        return $distance;
    }
}

?>
