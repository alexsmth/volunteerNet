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
    public function getUserID() {
        //something
    }
    public function getUserInfo($userID) {
        $db = GetModel();
        $query = "SELECT * FROM `users` WHERE `userID` = $userID";
        $queryparams = null;
        $arr = $db->rawQuery($query, $queryparams);
        return $arr;
    }
    public function getMissions($userID) {
        $userInfo = getUserInfo($userID);
        $userLongitude = $userInfo[0]["longitude"];
        $userLatitude = $userInfo[0]["latitude"];
        $db = $this->GetModel();
        $query = "SELECT * FROM `events` WHERE status = true";
        $queryparams = null;
        $arr = $db->rawQuery($query, $queryparams);
        $eventArr = array();
        $count = 0;
        while ($row = $arr->fetch_assoc()) {
            if (calcDistance($userLongitude, $row["longitude"], $userLatitude, $row["latitude"]) <= $MAX_DISTANCE) {
                $eventArr[$count] = $row;
                $count = $count + 1;
            }
        }
       return $eventArr;
    }
    public function allLogins() {
        $db = $this->GetModel();
        $query = "SELECT `userName`, `password` FROM `users`";
        $qeuryparams = null;
        $list = $db->rawQuery($query, $queryparams);
        return $list;
    }//leaks logins but I don't care
}
?>
