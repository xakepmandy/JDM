<?php
// Path to your project folder
$repo_dir = '/home/jagdambaminechem/public_html/';

// Command to execute git pull
$command = "cd $repo_dir && git pull origin main";

// Execute the command
exec($command);
?>
