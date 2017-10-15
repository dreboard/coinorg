<?php 
class FileManager {

function RmDirRecursive($path) 
{
    $realPath = realpath($path);
    if (!file_exists($realPath)) 
        return false;
    $DirIter = new RecursiveDirectoryIterator($realPath);       
    $fileObjects = new RecursiveIteratorIterator($DirIter, RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($fileObjects as $name => $fileObj) {
        if ($fileObj->isDir()) 
                rmdir($name);
        else
                unlink($name);
    }
    rmdir($realPath);
    return true;
}	
	
public static function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException('$dirPath must be a directory');
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}	

function recursiveRemove($dir) {
    $structure = glob(rtrim($dir, "/").'/*');
    if (is_array($structure)) {
        foreach($structure as $file) {
            if (is_dir($file)) recursiveRemove($file);
            elseif (is_file($file)) unlink($file);
        }
    }
    rmdir($dir);
}	
}//End Class
?>