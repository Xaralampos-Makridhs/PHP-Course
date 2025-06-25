<?php
    // Open and Close File
    $handle = fopen("example.txt", "r");
    fclose($handle);

    // READ FILES - using fread()
    $handle = fopen("example.txt", "r");
    $data = fread($handle, filesize("example.txt"));
    fclose($handle);

    // READ FILES - using file_get_contents()
    $data2 = file_get_contents("example.txt");

    // WRITE FILES - overwrite
    $handle = fopen("example.txt", "w"); // w = write only
    fwrite($handle, "Content!!!!");
    fclose($handle);

    // APPEND to file
    $handle = fopen("example.txt", "a"); // a = append only
    fwrite($handle, "New line added\n");
    fclose($handle);

    // Read file line by line
    $handle = fopen("example.txt", "r");
    while (!feof($handle)) {
        $line = fgets($handle);
        echo $line . "<br>";
    }
    fclose($handle);

    // LOG FUNCTION
    function write_log($message) {
        $file = 'log.txt';
        $current = "[" . date("Y-m-d H:i:s") . "] $message\n";
        file_put_contents($file, $current, FILE_APPEND);
        // FILE_APPEND adds content to the end of the file.
        // Without FILE_APPEND, the file content would be overwritten.
    }

    write_log("User logged in");
?>
