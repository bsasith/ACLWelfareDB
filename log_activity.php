<?php
function logActivity($con, $userId, $username, $activity) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $stmt = $con->prepare("INSERT INTO activity_log (user_id, username, activity, ip_address, user_agent) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $userId, $username, $activity, $ip, $userAgent);
    $stmt->execute();
    $stmt->close();
}
?>