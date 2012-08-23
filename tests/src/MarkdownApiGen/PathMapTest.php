<?php
namespace MarkdownApiGen\Test;

class PathMapTest extends \PHPUnit_Framework_TestCase {

    private $_pm;

    public function setUp()
    {
        $this->_pm = new \MarkdownApiGen\PathMap(RESOURCES.DS.'TestLib');
    }

    /**
     * @group current
     */
    public function testGetFilesToParse()
    {
        $this->assertContains('FirstClass', $this->_pm->getMap());
    }

}