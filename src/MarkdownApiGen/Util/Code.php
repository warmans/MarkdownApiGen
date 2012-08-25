<?php
/**
 * Code Util
 *
 * Parse raw code.
 *
 * @author warmans
 */
namespace MarkdownApiGen\Util {

    class Code {

        public static function getClassName($code)
        {
            if(preg_match('#^[\s]*(abstract[\s]+)?class[\s]*([a-zA-Z]+)#im', $code, $matches)){
                return trim($matches[2]);
            }
        }

        public static function getNamespace($code)
        {
            if(preg_match('#^namespace[\s]+(.+)[\s]*(;|\{)$#im', $code, $matches)){
                return trim($matches[1]);
            }
        }

        public function getInterfaceName($code)
        {
            if(preg_match('#^[\s]*interface[\s]*([a-zA-Z]+)#im', $code, $matches)){
                return trim($matches[1]);
            }
        }

        public static function isNamespaced($code)
        {
            if(preg_match('#^namespace.+(;|\{).*$#im', $code, $matches)){
                //namespaces can either contain code in braces or just represent a whole file
                switch ($matches[1]){
                    case '{':
                        return 1;
                    case ';':
                        return 2;
                }
            }
            return false;
        }

        public static function braceNamespace($code)
        {
            if($namespaceType = self::isNamespaced($code)){
                switch($namespaceType){
                    case 1:
                        return $code; //nothing to do
                    case 2:
                        $bracedNamespace =  preg_replace('#^(namespace.+)(;|\{)$#im', '$1 {', $code).PHP_EOL.'}';
                        return $bracedNamespace;
                    default:
                        throw new \RuntimeException('No Namespace Found in Class or unknown namespace delimiter');
                }
            }
        }

        public static function removePhpDelimiters($code)
        {
            return str_replace(array('<?php', '?>'), '', $code);
        }

        public static function removeBlockComments($code){
            return preg_replace('#/\*.*?\*/#si', '', $code);
        }
    }
}