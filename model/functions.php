<?php 
require_once('../controller/db.php');
class Base
{
    
    private $db_class;
    
    function __construct()
    {
        $this->db_class = new db();
    }
    
    function sqlInput($name, $offerName, $dimensions, $imageType, $headlines, $targetAudience, $landerUrls, $assets, $priority, $placement, $text_on_image, $notes)
    {
        $connection = $this->db_class->connectDB(); // Database of Creative Requests
        $sql = "INSERT INTO creative_request " . "(`name`, `offer`, `dimensions`, `image_type`, `headlines`, `audience`, `lander_url`, `assets`, `assigned_name`, `priority`, `placement`, `text_on_image`, `notes`)" . " VALUES " . 
        "('" . $name . "','" . $offerName . "','" . $dimensions ."','" . $imageType . "','" . $headlines . "','" . $targetAudience . "','" . $landerUrls . "','" . $assets . "','Not Assigned','" . $priority . "','" . $placement . "','" . $text_on_image . "','" . $notes . "')";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        

        if ($result === false) {        
            die(mysqli_error($result));  
        } else {
            $result = 'Added the creative request!';
        }

        $connection->close();
        return $result;
    }
    function sqlAssigned($assignedName, $id) {
        $connection = $this->db_class->connectDB(); // Database of Creative Requests
        $sql = "UPDATE `creative_request` SET assigned_name = '" . $assignedName . "' WHERE id = '" . $id . "'";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        
        if ($result === false) {        
            
            die(mysqli_error($result));  
            echo $result;
        } else {
            $result = 'Project Assigned.';
        }
        $connection->close();
        return $result;
    }
    function sqlComplete($id) {
        $connection = $this->db_class->connectDB(); // Database of Creative Requests
        $sql = "UPDATE creative_request SET `priority` = NULL WHERE id = '" . $id . "'";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        if ($result === false) {        
            
            echo 'Something went wrong with the completion.';
            
            die(mysqli_error($result));  
        } else {
            $result = 'Marked as Complete.';
        }
        $connection->close();
        return $result;
    }
    
    function sqlOutput() {
        $curRow = 0;
        
        $connection = $this->db_class->connectDB(); // Database of Creative Requests
        $sql = "SELECT * FROM creative_request WHERE `priority` != 'complete' ORDER BY (case when `priority` = 'low' then 2 when `priority` = 'mid' then 1 else 0 end);";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        ?>

        <!--<div class="well top-creative-container">
            <div class="row">
                <h3 class="creative-header">Top Creatives</h3>
                <div id="vertical-options" class="creative-options pull-right">
                    <select class="dropdown selectpicker" id="priority" name="priority" data-style="btn-primary" required>
                        <option selected="selected">Select Vertical</option>
                        <option value="skin">Skin</option>
                        <option value="diet">Diet</option>
                        <option value="muscle">Muscle</option>
                        <option value="credit">Credit</option>
                        <option value="mortgage">Mortgage</option>
                        <option value="skin-tag">Skin Tag Removal</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 top-creative">
                    <div class="place-container">
                        <div id="place-wrapper"> 
                            <div class="badge-ribbon" id="first-place"></div>
                        </div>
                    </div>
                    <img class='asset-img' src="../assets/img/placeholder.png" />
                    <div class="ctr-container">
                        <span class="ctr"><strong>CTR_1</strong></span>
                    </div>
                </div>
                <div class="col-md-4 top-creative">
                    <div class="place-container">
                        <div id="place-wrapper">
                            <div class="badge-ribbon" id="second-place"></div>
                        </div>
                    </div>
                    <img class='asset-img' src="../assets/img/placeholder.png" />
                    <div class="ctr-container">
                        <span class="ctr"><strong>CTR_1</strong></span>
                    </div>
                </div>
                <div class="col-md-4 top-creative">
                    <div class="place-container">
                        <div id="place-wrapper">
                            <div class="badge-ribbon" id="third-place"></div>
                        </div>
                    </div>
                    <img class='asset-img' src="../assets/img/placeholder.png" />
                    <div class="ctr-container">
                        <span class="ctr"><strong>CTR_1</strong></span>
                    </div>
                </div>
            </div>
        </div>-->
        
        <?php
        if(mysqli_num_rows($result) === 0){
            echo "No requests pending.";
            
        } elseif(mysqli_num_rows($result) > 0) { ?>

                
               <?php while($row = $result->fetch_array()) {
                    $headline_array = explode(',',$row['headlines']);
                    $asset_array = explode(',',$row['assets']);
                    $timeStamp = date_create($row['time_stamp']);
                    $timeFormatted = date_format($timeStamp, 'm/d/Y h:i a');
                    if($row['priority'] === 'low') {
                        echo "<div class='request-container low-priority well'>";
                    }
                    if($row['priority'] === 'mid') {
                        echo "<div class='request-container mid-priority well'>";
                    }
                    if($row['priority'] === 'high') {
                        echo "<div class='request-container high-priority well'>";
                    }
                    
                    if($row['priority'] === NULL) {
                        echo "<div class='request-container complete well'>";
                    } else if(empty($row['priority'])) {
                        echo "<div class='request-container complete well'>";
                    }  else if($row['priority'] === "Select Priority") {
                        echo "<div class='request-container complete well'>";
                    }
                    
                    echo "<div class='delete-button-wrapper pull-right'>";
                    echo "<form action='../model/variables.php' method='post'>";
                    echo "<button type='submit' value='" . $row['id'] . "' name='complete' class='btn pull-right delete-button'><span class='glyphicon glyphicon-remove'></span></button>";
                    echo "</form>";
                    echo "</div>";
                    echo "<div class='row top-row'>";
                    
                    echo "<div class='col-md-3'><h1>" . $row['offer'] . "</h1></div>";
                    echo "<div class='hidden' id='" . $row['id'] . "'></div>";
                    echo "<div class='col-md-2 assigned-to'><span class='label-top'>Assigned To</span> <div class='assigned-to'>" . $row['assigned_name'] . "<span data-toggle='modal' data-target='#post-name' class='assign-edit btn-secondary-edited glyphicon glyphicon-pencil'></span></div></div>"; // This needs to be adjusted server-side
                    echo "<div class='col-md-2 image-type-text'><span class='label-top'>Image Type</span>";
                    if($row['image_type'] === 'Static'){
                        echo "<span class='newline'><img class='image-type' width='45px' src='../assets/img/img.jpg'/></span>";
                    }            
                    if($row['image_type'] === 'Gif'){
                        echo "<span class='newline'><img class='image-type' src='../assets/img/gif.png'/></span>";
                    }
                    if($row['image_type'] === 'Video'){
                        echo "<span class='newline'><img class='image-type' src='../assets/img/video.png'/></span>";
                    }
                    
                    echo "</div>";
                    echo "<div class='col-md-3'><span class='label-top'>Requested By:</span> <strong>" . $row['name'] . "</strong><span class='label-top newline'> Requested Date:</strong> <strong>" . $timeFormatted . "</strong></div>";
                    
                    echo "<div class='col-md-2'>";
                    echo "<form action='../model/variables.php' method='post'>";
                    if($row['priority'] === NULL) {
                        echo "<button type='submit' value='" . $row['id'] . "' name='complete' class='btn btn-success pull-left'>Complete</button>";
                    } else {
                        echo "<button type='submit' value='" . $row['id'] . "' name='complete' class='in-progress btn btn-warning pull-left'>In Progress</button>";
                    }
                    
                    echo "</form>";
                    echo "<button type='button' class='expand pull-right btn btn-info' id='" . $row['id'] . "' data-toggle='collapse' data-target='#request-expanded-" . $row['id'] . "'><span class='glyphicon glyphicon-chevron-down' id='arrow-" . $row['id'] . "'></span></button>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='row collapse' id='request-expanded-" . $row['id'] . "'>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-6'>";
                    echo "<span class='well-label'>Lander Url</span>";
                    echo "<div class='custom-well well'><a href='"  .$row['lander_url'] . "'>" . $row['lander_url'] . "</a></div>";
                    echo "<span class='well-label'>Audience</span>";
                    echo "<div class='custom-well well'><div class='audience'>" . $row['audience'] . "</div></div>";
                    echo "<span class='well-label'>Dimensions</span>";
                    echo "<div class='dimensions'><div class='custom-well well'>" . $row['dimensions'] . "</div></div>";
                    echo "<span class='well-label'>Headlines</span>";
                    foreach($headline_array as $headline) {
                        echo "<div class='custom-well well'>";
                        echo "<ul>";
                        echo "<li class='headlines'>" . $headline . "</li>";
                        echo "</ul>";
                        echo "</div>";
                    }
                    
                    
                    echo "<span class='well-label'>Placement</span>";
                    echo "<div class='custom-well well'><div class='placement'>" . $row['placement']
                    . "</div></div>";
                    echo "<span class='well-label'>Notes</span>";
                    echo "<div class='custom-well well'><div class='notes'>" . $row['notes'] . "</div></div>";
                    // Under Information Container.
                    echo "<span class='well-label'>Needs Text</span>";
                    
                    if($row['text_on_image'] === 'no-text'){
                        echo "<div class='custom-well well'><strong>No Text</strong></div>";
                    }
                    if($row['text_on_image'] === 'yes-text'){
                        echo "<div class='custom-well well'><strong>Needs Text</strong></div>";
                    }
                    echo "</div>";
                    echo "<div class='col-md-6'>";
                    echo "<span class='well-label'>Assets</span>";
                    echo "<div class='custom-well assets-img'>";
                    echo "<div class='asset-wrap'>";
                    echo "<ul>";
                    foreach($asset_array as $asset) {
                        echo "<li class='assets'><img class='asset-img' width='150' src='../assets/img/uploads/" . $asset . "'/></li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";                
                    // Under Asset Container.
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    
                    $curRow++;
                    
                } 
            
            }   else {
                
                echo "Something went wrong with DB Output function.";
        }

        $result->close();
    }     
}
?>