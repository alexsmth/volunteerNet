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
        $curl = curl_init();
        $url = "http://nominatim.openstreetmap.org/search?q=".urlencode($this->ADDR)."&format=json&addressdetails=1";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        var_dump($curl);
        echo "<br/>";
        echo curl_getinfo($curl, CURLINFO_EFFECTIVE_URL);
        $response = curl_exec($curl);
        var_dump($curl);
        $err = curl_error($curl);
        curl_close($curl);
        var_dump($response);

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
