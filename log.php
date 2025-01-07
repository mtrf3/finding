<?php
// Log all request details to a file
$logFile = 'requests.log';

// Get all headers
$headers = getallheaders();
$headerStr = '';
foreach ($headers as $name => $value) {
    $headerStr .= "$name: $value\n";
}

// Get request details
$data = array(
    'time' => date('Y-m-d H:i:s'),
    'ip' => $_SERVER['REMOTE_ADDR'],
    'method' => $_SERVER['REQUEST_METHOD'],
    'uri' => $_SERVER['REQUEST_URI'],
    'headers' => $headerStr,
    'user_agent' => $_SERVER['HTTP_USER_AGENT'],
    'query' => $_SERVER['QUERY_STRING']
);

// Log it
file_put_contents($logFile, json_encode($data) . "\n", FILE_APPEND);

// Return a 1x1 transparent GIF
header('Content-Type: image/gif');
echo base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
?>
