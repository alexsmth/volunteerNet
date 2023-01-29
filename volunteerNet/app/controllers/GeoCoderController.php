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
            "Fishers High School, 13000, Promise Road, Fishers, Hamilton County, Indiana, 46038, United States" => "json4.json",
            "Military Park, Indianapolis, Marion County, Indiana, United States" => "json3.json",
            "Garfield Park, Indianapolis, Marion County, Indiana, United States" => "json2.json",
            "White River State Park, Indianapolis, Marion County, Indiana, United States" => "json1.json");
        $response = file_get_contents(ROOT_DIR_NAME . "json/" . $files[$ADDR]);
        $response = json_decode($response);
        echo $response;
        var_dump($response);
        $coords = array($response["lat"], $response["lon"]);
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
