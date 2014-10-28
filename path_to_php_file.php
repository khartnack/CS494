<?php
$fileNames = "";
   foreach (new DirectoryIterator("/~beltramk/CS494/final/uploadify/myuploads/") as $file) {
    if (! $file->isDot()) {
        if ($file->isFile()) {
            $fileNames .= $file . ":";
    		}
	}
}

echo $fileNames;
?>
