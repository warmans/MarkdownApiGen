<?php
namespace MarkdownApiGen\Test;

class DocBlockTest extends \PHPUnit_Framework_TestCase {

    /**
     * @group current
     */
    public function testGetDescription()
    {
        $docBlock = new \MarkdownApiGen\DocBlock('
            /**
             * Do The First Thing
             *
             * @param array $arg1
             * @param mixed $arg2
             * @return boolean
             */
        ');
        $this->assertEquals('Do The First Thing', $docBlock->getDescription());
    }

    /**
     * @group current
     */
    public function testGetMultiLineDescription(){
        $docBlock = new \MarkdownApiGen\DocBlock('
            /**
             * Do The First Thing
             *
             * do the thing on another line.
             *
             * @param array $arg1
             * @param mixed $arg2
             * @return boolean
             */
        ');

        $this->assertContains("Do The First Thing", $docBlock->getDescription());
        $this->assertContains("do the thing on another line.", $docBlock->getDescription());
    }

    /**
     * @group current
     */
    public function testGetDescriptionWithSpecialChars(){
        $docBlock = new \MarkdownApiGen\DocBlock('
            /**
             * !"£$%^&*(){}:@~<>?QWERTYUIOP1234567890`¬?><:@~}{=-+_|
             */
        ');

        $this->assertContains('!"£$%^&*(){}:@~<>?QWERTYUIOP1234567890`¬?><:@~}{=-+_|', $docBlock->getDescription());
    }

    /**
     * @group current
     */
    public function testGetParamAnnotation(){
        $docBlock = new \MarkdownApiGen\DocBlock('
            /**
             * Description
             * @param string $test the test variable.
             */
        ');
        $expected = array('type'=>'string', 'name'=>'$test', 'comment'=>'the test variable.');
        $paramAnnotations = $docBlock->getAnnotation('param');

        $this->assertEquals($expected, $paramAnnotations[0]);
    }

    /**
     * @group current
     */
    public function testGetParamAnnotationTypeOnly(){
        $docBlock = new \MarkdownApiGen\DocBlock('
            /**
             * Description
             * @param string
             */
        ');
        $expected = array('type'=>'string', 'name'=>NULL, 'comment'=>NULL);
        $paramAnnotations = $docBlock->getAnnotation('param');

        $this->assertEquals($expected, $paramAnnotations[0]);
    }

    /**
     * @group current
     */
    public function testGetParamAnnotationTypeAndNameOnly(){
        $docBlock = new \MarkdownApiGen\DocBlock('
            /**
             * Description
             * @param string $foo
             */
        ');
        $expected = array('type'=>'string', 'name'=>'$foo', 'comment'=>NULL);
        $paramAnnotations = $docBlock->getAnnotation('param');

        $this->assertEquals($expected, $paramAnnotations[0]);
    }

    /**
     * @group current
     */
    public function testGetParamAnnotationObjectType(){
        $docBlock = new \MarkdownApiGen\DocBlock('
            /**
             * Description
             * @param \Foo\Bar\Baz
             */
        ');

        $paramAnnotations = $docBlock->getAnnotation('param');
        $this->assertEquals('\Foo\Bar\Baz', $paramAnnotations[0]['type']);
    }

    /**
     * @group current
     */
    public function testGetParamAnnotatonMultiple(){
        $docBlock = new \MarkdownApiGen\DocBlock('
            /**
             * Description
             * @param string $foo
             * @param mixed $bar
             * @param \User\Account $baz
             */
        ');
        $paramAnnotations = $docBlock->getAnnotation('param');

        $this->assertEquals(array('type'=>'string', 'name'=>'$foo', 'comment'=>NULL), $paramAnnotations[0]);
        $this->assertEquals(array('type'=>'mixed', 'name'=>'$bar', 'comment'=>NULL), $paramAnnotations[1]);
        $this->assertEquals(array('type'=>'\User\Account', 'name'=>'$baz', 'comment'=>NULL), $paramAnnotations[2]);
    }

    /**
     * @group current
     */
    public function testGetReturnAnnotation(){
        $docBlock = new \MarkdownApiGen\DocBlock('
            /**
             * Description
             * @return string the comment
             */
        ');

        $annotation = $docBlock->getAnnotation('return');
        $this->assertEquals(array('type'=>'string', 'comment'=>'the comment'), $annotation);
    }

    /**
     * @group current
     */
    public function testGetRandomAnnotation(){
        $docBlock = new \MarkdownApiGen\DocBlock('
            /**
             * Description
             * @fixme Something is seriously broken here.
             */
        ');

        $annotation = $docBlock->getAnnotation('fixme');
        $this->assertEquals('Something is seriously broken here.', $annotation);
    }
}