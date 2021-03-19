<?php
$conn = mysqli_connect(getenv("CONQUER_DB_HOST"), getenv("CONQUER_DB_USERNAME"),  getenv("CONQUER_DB_PASSWORD"), getenv("CONQUER_DB_DATABASE"), getenv("CONQUER_DB_PORT"));
if (isset($_GET["custom"]) && isset($_GET["votingip"])) {
    $username = $_GET["custom"];
    $ip = $_GET["votingip"];
    if (!$conn->connect_errno) {
        if ($username && $ip) {
            $query = mysqli_query($conn, "UPDATE entities SET ConquerPoints=ConquerPoints+1000 WHERE Owner='" . $username . "'");
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
        file_put_contents('last_vote_success.txt', $content);
    } else {
        $content = "Error in mysql\r\n";
        file_put_contents('last_vote_error.txt', $content);
    }
}
?>
