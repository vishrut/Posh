<?php
$dbhost = 'ap-cdbr-azure-east-a.cloudapp.net';
$dbuser = 'b70d55a676a5fc';
$dbpass = '7bea5405';
$dbname = 'poshdb';
$backup_file = $dbname . date("Y-m-d-H-i-s") . '.gz';
$command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass ".
           "test_db | gzip > $backup_file";

system($command);
?>