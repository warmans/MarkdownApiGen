<?php
namespace TestLib;

/**
 * This class is responsible for being the first class in the text parser.
 * This is important because without a first class...

 * @link http://www.google.com Google Website
 * @author warmans
 */
class FirstClass {

    /**
     * Do The First Thing
     *
     * @param array $arg1 This is a BAR attribute
     * @param mixed $arg2
     * @todo fix this method
     * @return boolean
     */
    public function doFirstThing(FirstClass $arg1, $arg2='foo', $arg3=123)
    {
        return TRUE;
    }

    /**
     * Do the second thing.
     *
     * @param FirstClass $myself
     * @return \FirstClass
     */
    public function doSecondThing(FirstClass $myself)
    {
        return $myself;
    }

    /**
     * Do something private.
     * @return array
     */
    private function _doPrivateThing($arrayValue = array('foo', 'bar'))
    {
        return array('foo', 'bar', 'baz');
    }

}