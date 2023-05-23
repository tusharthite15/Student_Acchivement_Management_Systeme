<?php

if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    
    // Check if the file exists
    $filePath = $fileName;
    if (file_exists($filePath)) {
        // Set the appropriate header for the file type
        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
        switch ($fileExtension) {
            case 'pdf':
                header('Content-Type: application/pdf');
                break;
            case 'jpg':
            case 'jpeg':
                header('Content-Type: image/jpeg');
                break;
            case 'png':
                header('Content-Type: image/png');
                break;
            default:
                header('Content-Type: application/octet-stream');
                break;
        }

        // Output the file content
        readfile($filePath);
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid file name.";
}
?>
