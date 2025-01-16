<?php
// A simple script that can be called by GitHub webhook to trigger a git pull without exec.

// Webhook verification logic (optional)
$secret = 'kyufdtyfcJHGVCHFgcgjcfjgCHGfc';  // Set a secret if you have configured one for the webhook
$headers = getallheaders();
$signature = $headers['X-Hub-Signature'];
$payload = file_get_contents('php://input');
$computed_signature = 'sha1=' . hash_hmac('sha1', $payload, $secret);

if ($signature !== $computed_signature) {
    header('HTTP/1.1 403 Forbidden');
    echo 'Invalid webhook signature';
    exit();
}

// Define the path to the Git repository
$repo_dir = '/home/username/public_html/yourproject';

// Ensure the repository is already cloned on the server using CPanel's Git Version Control.

// PHP Script to create and call a .sh script to run git pull (without exec())
$sh_script = '/home/username/public_html/yourproject/git-pull.sh';

// Contents of git-pull.sh
$sh_contents = "#!/bin/bash\ncd $repo_dir && git pull origin master\n";

// Write the script to a file
file_put_contents($sh_script, $sh_contents);

// Ensure the script is executable
chmod($sh_script, 0755);

// Run the shell script using PHP system() function, instead of exec().
// This will only work if PHP has permissions to run the script.
$output = system($sh_script, $return_var);

// Output response (can be checked for debugging purposes)
echo "Git pull executed. Output: $output";
?>
