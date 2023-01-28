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
        $url = "https://nominatim.openstreetmap.org/search?q=".urlencode($ADDR)."&addressdetails=1";//consider in final productions setting up the api on the box.
        $data = json_decode(file_get_contents($url));
        $coords = array($data[0]["lat"], $data[0]["lon"]);
        return $coords;
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
