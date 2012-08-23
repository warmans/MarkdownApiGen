<?php
/**
 * FileMap
 *
 * Map paths in a directory to real names. USed for select boxes of file contents mostly.
 *
 * @author warmans
 */
namespace MarkdownApiGen {

    class PathMap {

        private $_map = array();

        public function __construct($basePath, $excludeExtension='.php') {

            $iterator = new \RecursiveDirectoryIterator($basePath);

            foreach(new \RecursiveIteratorIterator($iterator) as $path){
                if($path->isFile()){
                    $baseName = basename($path->getFilename(), $excludeExtension);
                    $pathString = $path->getPathname();
                    $this->_map[$pathString] = $baseName;
                }
            }
        }

        public function getMap(){
            return $this->_map;
        }

    }
}