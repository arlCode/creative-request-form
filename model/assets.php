<?php 
require_once('../controller/db.php');

$asset = new Asset();

if(isset($_POST['submit_search'])) {
    $asset->searchFolder($_POST['search_term']);
}

class Asset {

    private $db_class;
    private $searchTerm;
    
    function __construct()
    {
        $this->db_class = new db();
        $this->searchTerm = $_POST['search_term'];

    }
    

    function readFolder() // Im not proud, only some changes for mine I plucked this from StackOverflow Reference: https://stackoverflow.com/questions/32296838/filter-directories-from-recursivedirectoryiterator
    {
        $dir = new RecursiveDirectoryIterator('../assets/img/assets/');
        $dir->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);

        //define the directories you don't want to include
        $excludeDirs = array('premade', '._', '.DS_Store');
        
        $files = new RecursiveCallbackFilterIterator($dir, function($file, $key, $iterator) use ($excludeDirs){
            if($iterator->hasChildren() && !in_array($file->getFilename(), $excludeDirs)){
                return true;
            }
            return $file->isFile();
        });
        
        foreach(new RecursiveIteratorIterator($files) as $file){
            if(substr($file, -strlen(".DS_Store")) === ".DS_Store" || substr($file->getFileName(), 0, 2) === "._") continue; ?> <!-- Skips Hidden Files -->
                <div class="asset-sidebar-img img-container" style="background:url('<?php echo $file ?> ') center center no-repeat; background-size:contain;"></div> <?php
        }
    }

    function searchFolder($searchTerm)
    {
        $dir = new RecursiveDirectoryIterator('../assets/img/assets/');
        $dir->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
        
        //define the directories you don't want to include
        $excludeDirs = array('premade');
        
        $files = new RecursiveCallbackFilterIterator($dir, function($file, $key, $iterator) use ($excludeDirs){
            if($iterator->hasChildren() && !in_array($file->getFilename(), $excludeDirs)){
                return true;
            }
            return $file->isFile();
        });
        
        foreach(new RecursiveIteratorIterator($files) as $file){
            if(substr($file, -strlen(".DS_Store")) === ".DS_Store" || substr($file->getFileName(), 0, 2) === "._") continue; ?> <!-- Skips Hidden Files -->
          <div class="asset-sidebar-img img-container" style="background:url('<?php echo $file ?> ') center center no-repeat; background-size:contain;"></div> <?php
        }
    }
}

?>