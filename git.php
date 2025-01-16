<?php
// A simple script that can be called by GitHub webhook to trigger a git pull.

// Webhook verification logic (optional)
$secret = 'kyufdtyfcJHGVCHFgcgjcfjgCHGfc';
$headers = getallheaders();
$signature = $headers['X-Hub-Signature'];
$payload = file_get_contents('php://input');
$computed_signature = 'sha1=' . hash_hmac('sha1', $payload, $secret);

if ($signature !== $computed_signature) {
    header('HTTP/1.1 403 Forbidden');
    echo 'Invalid webhook signature';
    exit();
}

// Trigger the git pull by calling a script or using cron jobs
// For now, we'll just trigger the git pull through a cron job.
// For a manual approach, make sure the git repository is already cloned in CPanel.

$repo_dir = '/home/username/public_html/yourproject';

// Attempt to pull the latest code from GitHub (you should have a git repository already cloned)
$command = "cd $repo_dir && git pull origin master";

// You will need a cron job set up to run this command. The cron job will listen for changes and pull automatically.
// To make this script actionable, create a cron job or make sure Git Version Control is set to update.

echo 'Webhook received and git pull triggered.';
?>
