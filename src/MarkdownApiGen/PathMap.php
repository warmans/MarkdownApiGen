<?php
/**
 * Get a list of paths and file names.
 *
 * @author warmans
 */
namespace MarkdownApiGen {

    class PathMap {

        private $_map = array();

        /**
         * Scan the supplied directory for files (recursive).
         *
         * @param string $basePath
         * @param string $excludeExtension
         */
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

        /**
         * Get the mapping
         * @return array
         */
        public function getMap(){
            return $this->_map;
        }

    }
}