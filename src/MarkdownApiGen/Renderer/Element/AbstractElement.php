<?php
namespace MarkdownApiGen\Renderer\Element  {

    use \MarkdownApiGen\Renderer\Formatter;

    /**
     * AbstractElement
     *
     * @author Stefan
     */
    abstract class AbstractElement {

        /**
         * @var \MarkdownApiGen\Renderer\Formatter\AbstractStrategy
         */
        protected $_fs;
        protected $_data;
        protected $_elementName;

        protected static $_config;

        /**
         * @param array $libDataCache all package data
         */
        public function __construct(Formatter\AbstractStrategy $formatStrategy, $elementName, array &$data)
        {
            $this->_fs = $formatStrategy;
            $this->_data = $data;
            $this->_elementName = $elementName;
        }

        /**
         * Factory
         *
         * @param \MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy
         * @param type $elementName
         * @param array $data
         * @return \static
         */
        public static function create(Formatter\AbstractStrategy $formatStrategy, $elementName, array $data)
        {
            return new static($formatStrategy, $elementName, $data);

        }

        /**
         * Allows static config to be set in element parent class (i.e. all elements have access to it)
         *
         * @param array $config
         * @return \MarkdownApiGen\Renderer\Element\AbstractElement
         */
        public function setConfig(array $config){
            self::$_config = $config;
            return $this;
        }

        public function config($name)
        {
            return isset(self::$_config[$name]) ? self::$_config[$name] : NULL;
        }

    }
}