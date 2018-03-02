<?php


require("functions.php");


$base_class = new Base();


if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $productName = $_POST['productName'];
    $dimensions = $_POST['dimensions'];
    $imageType = $_POST['imageType'];
    $headlines = $_POST['headlines'];
    $targetAudience = $_POST['targetAudience'];
    $landerUrl = $_POST['landerUrls'];
    $priority = $_POST['priority'];
    $placement = $_POST['placement'];
    $text_on_image = $_POST['text_on_image'];
    $notes = $_POST['notes'];

    $assignedName = $_POST['assigned-name'];
    $idToChange = $_POST['hidden'];

    $complete = $_POST['complete'];
    // print_r($_FILES);

    if(isset($_POST['complete'])) {
        $id = $_POST['complete'];
        $base_class->sqlComplete($id);

        include('../controller/globals.php'); 
        
    }

    if(isset($_POST['submit_request'])) {

        if(isset($name)) {
            $headline_array = implode(',', $headlines);
            $fileCount = count($_FILES['filesToUpload']);

                if($fileCount) {
                    
                    $filesToUpload = $_FILES['filesToUpload']['tmp_name'];
                    $fileNameArray = $_FILES['filesToUpload']['name'];
                    $fileArray = array();
                    

                    foreach($filesToUpload as $files){
                            $newname = date('YmdHis',time()).mt_rand().'.jpg';

                            if(file_exists($files)){

                            } else {
                                echo "Failed to upload to temp.";
                            }

                            
                            if(move_uploaded_file($files,'/var/www/html/botfather/intranet/creative-request-form/assets/img/uploads/'. $newname)) {

                            } else {
                                echo "Failed to upload." . $files;
                            }

                            $fileArray[] = $newname;
                    }
                    
                    $asset_array = implode(',', $fileArray);
                    $base_class->sqlInput(addslashes($name), addslashes($productName), $dimensions, $imageType, addslashes($headline_array), addslashes($targetAudience), $landerUrl, $asset_array, $priority, $placement, $text_on_image, addslashes($notes));
                }
            }

            include('../controller/globals.php'); 
    }

    if(isset($_POST['submit_name'])) {

        if(isset($assignedName)) {
            echo $base_class->sqlAssigned($assignedName, $idToChange);
        
            include('../controller/globals.php'); 
        }
    }
}


?>
