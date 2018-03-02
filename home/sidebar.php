<?php require('../model/assets.php'); ?>
<?php $asset_class = new Asset(); ?>

<div class="sidebar-wrapper">
    <div class="sidebar-close-wrapper col-md-12">
        <div class="logo-sidebar ">
            <img src="../assets/img/logo.jpg" width="120px" />
        </div>
        <div class="sidebar-close glyphicon glyphicon-remove pull-right"></div>
    </div>

    <div class="sidebar">
        <div class="searchbar-wrapper">
            <div class="search">
            <div class="btn btn-sidebar-upload">Upload Image <span class="glyphicon glyphicon-upload"></span><input type="file" class="form-control" name="filesToUpload[]" id="filesToUpload" multiple required /></div></div>
                <div>Or Select from gallery...</div>
                
                <!-- <form id="search-form" class="sidebar-search" action="../model/assets.php" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search_term" id="search" placeholder="Search...">
                        <div class="input-group-btn">
                            <button class="btn btn-default" name="submit_search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
            </div>
            </form> -->
        </div>

        <div class="asset-img-wrapper">
            <!-- Loops through the folders and file names with the creative assets. -->
            <?php
                $asset_class->readFolder();
            ?>
        </div>
        
    </div>
</div>
</div>