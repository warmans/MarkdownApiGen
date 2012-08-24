<?php
/**
 * TODO: Change name of library. actually produces markdown from a package. Not a wiki from a lib.
 */
namespace MarkdownApiGen {

    class Parser {

        private $_dataCache = array(
            'namespaces'=>array()
        );

        private $_outputDir;
        private $_fs;
        private $_apiName;

        private $_config = array();

        public function __construct($outputDir, Renderer\Formatter\AbstractStrategy $formatStrategy, $apiName)
        {
            $this->_outputDir = $outputDir;
            $this->_fs = $formatStrategy;
            $this->_apiName = $apiName;
        }

        /**
         * Add additional config to the parser
         * @param array $config
         */
        public function setConfig(array $config)
        {
            $this->_config = $config;
        }

        /**
         * @todo need a design for the complete document. E.g. list of classes at the top or everything inline (namespace -> class -> method -> method)
         *
         * @param type $packageRoot
         * @param type $namespace
         */
        public function parsePackage($packageRoot, $namespace)
        {
            foreach($this->_getFilesToParse($packageRoot.DIRECTORY_SEPARATOR.$namespace) as $path=>$className)
            {
                preg_match("#($namespace.+$className)\.php#", $path, $matches);

                if(!empty($matches[1]))
                {
                    $className = '\\'.trim(str_replace('/', '\\', $matches[1]), '\\');
                }

                //include the class
                require_once($path);

                //fixme: the file we just included may not even be a class...
                if(class_exists($className))
                {
                    $this->_parseClass(new \ReflectionClass($className));
                }
            }

            return $this->_renderApiDoc();
        }

        private function _parseClass(\ReflectionClass $class)
        {
            //create new namespace in cache
            if(!isset($this->_dataCache['namespaces'][$class->getNamespaceName()]))
            {
                $this->_dataCache['namespaces'][$class->getNamespaceName()] = array();
            }

            //create new class within namespace
            $this->_dataCache['namespaces'][$class->getNamespaceName()][$class->getShortName()] = array();
            $classData =& $this->_dataCache['namespaces'][$class->getNamespaceName()][$class->getShortName()];

            $classData['doc'] = new \MarkdownApiGen\DocBlock($class->getDocComment());
            $classData['methods'] = array();

            foreach($class->getMethods() as $method)
            {
                if(!$method->isInternal())
                {
                    $classData['methods'][$method->getName()] = $this->_parseMethod($method);
                }
            }
        }

        private function _parseMethod(\ReflectionMethod $method)
        {
            $methodData = array();
            $methodData['doc'] = new \MarkdownApiGen\DocBlock($method->getDocComment());
            $methodData['visibility'] = ($method->isPrivate()) ? 'private' : ($method->isProtected() ? 'protected' : 'public');
            $methodData['params'] = array();

            $params = $method->getParameters();
            foreach($params as $param)
            {
                $methodData['params'][] = $this->_parseParam($param);
            }
            return $methodData;
        }

        private function _parseParam(\ReflectionParameter $param)
        {
            return array(
                'name'=>$param->getName(),
                'type'=>$this->_getTypeHintForParam($param),
                'required'=>($param->isOptional() ? 'optional' : 'required'),
                'default_val'=>($param->isOptional() ? $param->getDefaultValue() : NULL)
            );
        }

        private function _getTypeHintForParam(\ReflectionParameter $param)
        {
            preg_match('/\[\s\<\w+?>\s([^\s]+)/s', $param->__toString(), $matches);
            return (isset($matches[1]) && !strstr($matches[1], '$')) ? $matches[1] : null;
        }

        private function _renderApiDoc()
        {
            return Renderer\Element\PageBlock::create($this->_fs, $this->_apiName, $this->_dataCache)
                ->setConfig($this->_config)
                ->render();
        }

        /**
         * @param string $path
         * @return array
         */
        private function _getFilesToParse($path)
        {
            $pathMap = new PathMap($path);

            //the result must be reverersed of you get all the sub directories first
            return array_reverse($pathMap->getMap());
        }

    }

}