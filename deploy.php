<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Set the repository and deployment directory
$repoDir = '/home/jagdambaminechem/public_html';

// Ensure the script is being triggered by GitHub
$secret = 'KJBXIIbIgihYGVXGUJ';
$headers = getallheaders();
if (!isset($headers['X-Hub-Signature-256'])) {
    http_response_code(403);
    exit('Access denied');
}

$payload = file_get_contents('php://input');
$hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);

if (!hash_equals($hash, $headers['X-Hub-Signature-256'])) {
    http_response_code(403);
    exit('Invalid signature');
}

// Pull changes from the repository
exec("cd $repoDir && git pull origin main 2>&1", $output, $status);

if ($status === 0) {
    echo "Deployment successful.\n";
} else {
    echo "Deployment failed.\n";
    print_r($output);
}
?>
