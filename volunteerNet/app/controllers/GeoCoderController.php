<?php
/*
https://nominatim.openstreetmap.org/search?q=Fishers+High+School%2C+Promise+Road%2C+Fishers%2C+IN&format=json&polygon=1&addressdetails=1

our get request "https://nominatim.openstreetmap.org/search?q=[ADDRESS]&addressdetails=1"
*/
class GeoCoderController {
    private string $ADDR;
    function __construct($address) {
        $this->ADDR = $address;
    }

    /*Converts the Address into longitude and latitude coordiates
     * @args void @return array
     */
    public function getGeoInfo() {
        $url = "http://nominatim.openstreetmap.org/search?q=".urlencode($this->ADDR)."&format=json&addressdetails=1";
        $files = array(
            "Fishers High School, 13000, Promise Road, Fishers, Hamilton County, Indiana, 46038, United States" => array(39.9772693, -85.96561337932947),
            "Military Park, Indianapolis, Marion County, Indiana, United States" => array(39.77047465, -86.16862991096829),
            "Garfield Park, Indianapolis, Marion County, Indiana, United States" => array(39.7335754, -86.14706449988584),
            "White River State Park, Indianapolis, Marion County, Indiana, United States" => array(39.7681217, -86.17919594646895));
        return $files[$this->ADDR];
    }
    /* returns the Address curently loaded in the object instance
     * @args void @return string
     */
    public function getAddress() {
        return $this->ADDR;
    }
    //consider adding a static function that can take two addreses and return the distance between the two.
}
?>
