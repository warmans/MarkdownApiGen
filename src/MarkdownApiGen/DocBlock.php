<?php
/**
 * DocBlock
 *
 * @author Stefan
 */
namespace MarkdownApiGen {

    class DocBlock {

        private $_rawDocBlock;

        private $_parserResult = array(
            'description'=>array(),
            'annotations'=>array()
        );

        public function __construct($rawDocBlock)
        {
            //always standardise line endings
            $this->_rawDocBlock = str_replace("\n\r" , "\n", $rawDocBlock);

            //parse raw block into component parts
            $this->_parse();
        }

        public function getDescription()
        {
            return trim(implode(PHP_EOL, $this->_parserResult['description']));
        }

        public function getAnnotation($type){
            if(isset($this->_parserResult['annotations'][$type])){
                return $this->_parserResult['annotations'][$type];
            }
            return NULL;
        }

        public function getAnnotations(){
            return $this->_parserResult['annotations'];
        }

        private function _parse(){
            foreach(explode("\n", $this->_rawDocBlock) as $line)
            {
                //start and end of block are not significant
                if(preg_match('#^[\s]*(\/\*\*|\*/)#', $line)){
                    continue;
                }

                //significant line - possibly a description or @annotation
                if(preg_match('#^[\s\*]*(.*)$#', $line, $matches))
                {
                    if(isset($matches[1]))
                    {
                        //if the line starts with an @ it is expected to be an annotation
                        if(preg_match('#^@[a-z0-9]+#i', trim($matches[1])))
                        {
                            $this->_parseAnnotation(trim($matches[1]));
                        }
                        else {
                            $this->_parseText(trim($matches[1]));
                        }
                    }
                }
            }
        }

        /**
         * Arbritrary text line
         */
        private function _parseText($line)
        {
            $this->_parserResult['description'][] = (strlen($line) > 0) ? $line : '';
        }

        private function _parseAnnotation($line)
        {
            preg_match('#^@([a-z0-9]+)[\s]([^\s]+[\s])?([^\s]+[\s])?(.*)?#i', $line, $matches);

            //don't bother with blank lines - there's no way of knowing which part of an annotation has not been parsed
            //so we can only read them as though the left-most parats of an annotation were provided
            $matches = array_values(array_filter($matches));

            if(count($matches) >= 1)
            {
                switch($matches[1])
                {
                    case 'param':
                        // @param type $varname comment
                        if(!isset($this->_parserResult['annotations']['param']))
                        {
                            $this->_parserResult['annotations']['param'] = array();
                        }
                        $annotationParts = array();
                        $annotationParts['type'] =  empty($matches[2]) ? NULL : trim($matches[2]);
                        $annotationParts['name'] =  empty($matches[3]) ? NULL : trim($matches[3]);
                        $annotationParts['comment'] =  empty($matches[4]) ? NULL : trim($matches[4]);
                        $this->_parserResult['annotations']['param'][] = $annotationParts;
                        return TRUE;

                    case 'return':
                        // @return type comment

                        $annotationParts = array();
                        $annotationParts['type'] =  empty($matches[2]) ? NULL : trim($matches[2]);
                        $annotationParts['comment'] =  (count($matches) >= 3) ? implode('', array_slice($matches, 3)) : '';
                        $this->_parserResult['annotations']['return'] = $annotationParts;
                        return TRUE;

                    default:
                        // @access, @author, @version, @see, @link, @since, @deprecated, @deprec, @todo, @fixme
                        // @exception, @throws,
                        $this->_parserResult['annotations'][$matches[1]] = (count($matches) >= 2) ? implode('', array_slice($matches, 2)) : '';
                }
            }
        }

    }

}