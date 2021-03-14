<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "conquer", "3307");
$username = $_GET["custom"];
$ip = $_GET["votingip"];
if (!$conn->connect_errno) {
    if ($username && $ip) {
        $query = mysqli_query($conn, "UPDATE entities SET DeltaPuntos=DeltaPuntos+40 WHERE Owner='" . $username . "'");
        if ($query) {
            $content = "Voted => " . $username . "\r\n";
        } else {
            $content = "Error on update " . $username . " => Error: " . mysqli_error($conn);
        }
    } else {
        $content = "Cannot get the username value parameter\r\n";
        foreach ($_GET as $param_name => $param_val) {
            $content .= "GETParam: $param_name; Value: $param_val<br />\n";
        }
    }
    file_put_contents('vote_success.txt', $content);
} else {
    $content = "Error in mysql\r\n";
    file_put_contents('vote_error.txt', $content);
}
?>
