<?php
namespace MarkdownApiGen\Test;

class ParserTest extends \PHPUnit_Framework_TestCase {

    private $_parser;

    public function setUp()
    {
        $this->_parser = new \MarkdownApiGen\Parser(sys_get_temp_dir(), new \MarkdownApiGen\RenderStrategy\GitHubMarkdown());
    }

    /**
     * @group current
     */
    public function testGetNamespaces()
    {
        //$this->_parser->parsePackage(RESOURCES, 'TestLib');
        $this->_parser->parsePackage('C:\xampp\htdocs\closureform\src', 'ClosureForm');
    }
}