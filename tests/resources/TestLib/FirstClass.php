<?php
namespace TestLib;

/**
 * This class is responsible for being the first class in the text parser.
 * This is important because without a first class...
 *
 * @author warmans
 */
class FirstClass {

    /**
     * Do The First Thing
     *
     * @param array $arg1
     * @param mixed $arg2
     * @return boolean
     */
    public function doFirstThing(FirstClass $arg1, $arg2=NULL)
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
    private function _doPrivateThing(){
        return array('foo', 'bar', 'baz');
    }

}