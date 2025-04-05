<?php
// Written by Mathias Haegglund after getting fed up with Google Analytics and other Analytics tools.
// We know what we are doing, most of the time
ini_set("display_errors", 0);
ini_set("display_startup_errors", 0);
error_reporting(E_ALL);

// Add CORS Light and call Jason
header("Access-Control-Allow-Origin: https://your-domain.com"); // can be a * or it can be a domain name. Your choice
header("Access-Control-Allow-Methods: POST"); // Don't touch this one, Watson
header("Access-Control-Allow-Headers: Content-Type"); // Don't touch this one either, Watson
header("Content-Type: application/json"); // Don't touch this one as well, Watson

// We are making cookies
$rawInput = file_get_contents("php://input");

// oh no, you little addict
$data = json_decode($rawInput, true);

if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {
    // Validate and sanitize input data. Scrub it good!
    $dateTime = filter_var($data["dateTime"], FILTER_SANITIZE_STRING);
    $userAgent = filter_var($data["userAgent"], FILTER_SANITIZE_STRING);
    $location = filter_var($data["location"], FILTER_SANITIZE_STRING);
    $pageViewed = filter_var($data["pageViewed"], FILTER_SANITIZE_STRING);

    // Prepare for re-entry
    $logEntry = sprintf("%s, %s, %s, %s\n", $dateTime, $userAgent, $location, $pageViewed);

    // Where magic goes to die
    $logDir = __DIR__ . "/ana/lytics"; // can be anything you want it to be. 100% flexible
    $logFile = $logDir . "/" . date("Y-m-d") . ".ana";  // use any .blob file format you like

    // One apple a day keeps the doctor away
    if (!file_exists($logDir)) {
        mkdir($logDir, 0755, true);
    }

    // The gift that keeps on giving
    if (file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX) === false) {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Internal Server Error"]);
    } else {
        echo json_encode(["status" => "success", "message" => "Logged"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Bad Request"]);
}
?>
