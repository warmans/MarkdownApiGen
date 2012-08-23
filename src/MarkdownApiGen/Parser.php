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

        private $_rs;

        public function __construct($outputDir, \MarkdownApiGen\RenderStrategy\AbstractRenderer $renderStrategy)
        {
            $this->_outputDir = $outputDir;
            $this->_rs = $renderStrategy;
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

                require_once($path);
                $this->_parseClass(new \ReflectionClass($className));
            }

            die($this->_flushOutputToDisk());
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

        private function _flushOutputToDisk()
        {
            $output = array();
            $output[] = $this->_rs->H1('Package Name');

            foreach($this->_dataCache['namespaces'] as $namespace=>$classes)
            {
                $output[] = $this->_rs->H2($namespace);
                foreach($classes as $className=>$classDetails)
                {
                    //Class title
                    $output[] = $this->_rs->H3($className);

                    //Annotations e.g. author
                    $classAnnotations = array();
                    foreach($classDetails['doc']->getAnnotations() as $annotationTag => $annotationValue)
                    {
                        $classAnnotations[] = "$annotationTag : $annotationValue";
                    }

                    //Methods
                    $methodsBlock = array();
                    foreach($classDetails['methods'] as $methodName=>$methodDetails)
                    {
                        //Parse arguments to line
                        $argumentLine  = array();
                        foreach($methodDetails['params'] as $paramNum => $param)
                        {
                            $paramAnnotation = $methodDetails['doc']->getAnnotation('param');
                            $paramTypeHint = $param['type'] ?: $paramAnnotation[$paramNum]['type'];
                            $argumentLine[] = (($param['required'] == 'required') ? '' : '[').$paramTypeHint.' $'.$param['name'].(($param['required'] == 'required') ? '' : ']');
                        }

                        //Method name and args
                        $methodsBlock[] = $this->_rs->Paragraph($this->_rs->Pre(
                            $this->_rs->Label($methodDetails['visibility']).' '.$this->_rs->strong($methodName).'( '.implode(", ", $argumentLine).' )'
                        ));

                        //Method DocBlock
                        $annotations = $methodDetails['doc']->getAnnotations();

                        //Param annotations
                        $argumentAnnotations = array();
                        if(isset($annotations['param'])){
                            foreach($annotations['param'] as $paramAnnotation)
                            {
                                $argumentAnnotations[] = $this->_rs->Label('Param: '.$paramAnnotation['name'].' '.$paramAnnotation['type'].' '.$paramAnnotation['comment'])."\n";
                            }
                        }

                        $methodsBlock[] = $this->_rs->Paragraph(
                            $this->_rs->Indented(
                                implode("", $argumentAnnotations)."\n".
                                $methodDetails['doc']->getDescription()."\n".
                                ((!empty($annotations['return'])) ? 'Returns: '.$annotations['return']['type'].' '.$annotations['return']['comment'] : '')

                            )
                        );
                    }

                    //Class description
                    $output[] = $this->_rs->Indented(
                        $this->_rs->Paragraph($classDetails['doc']->getDescription()).
                        $this->_rs->Paragraph(implode("\n", $classAnnotations)).
                        $this->_rs->Hr().
                        implode("", $methodsBlock)
                    );
                }
            }

            return implode("\n", $output);
        }

        private function _getFilesToParse($path)
        {
            $pathMap = new PathMap($path);
            return $pathMap->getMap();
        }

        private function _getReflectionClass($path, $className)
        {
            require_once($path);
            return new \ReflectionClass($className);
        }

    }

}