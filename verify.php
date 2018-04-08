<?php

$conn = mysqli_connect("127.0.0.1","root","","instafollow");

// if($conn){
//     echo 'hello';
// }


$otherPage = 'nd_5101';
$response = file_get_contents("https://www.instagram.com/$otherPage/?__a=1");
if ($response !== false) {
    $data = json_decode($response, true);
    if ($data !== null) {
        // $follows = $data['user']['follows']['count'];
        $followedBy = $data['user']['followed_by']['count'];
        // echo $followedBy;

        $query = mysqli_query($conn, "UPDATE `follower` SET `follower`= '$followedBy' WHERE id = 1");
    }
}


$query = mysqli_query($conn, "SELECT `follower` FROM `follower` WHERE `id` = 1");

$have = mysqli_fetch_assoc($query);

$getfollow = $have['follower'];

if($getfollow < $followedBy){
    echo "sahi hai boss";
}
elseif($getfollow == $followedBy){
    echo "not done ";
}

?>
