<?php
/**
 * Namespace Block. Renders everything at a namespace level
 *
 * @author Stefan
 */
namespace MarkdownApiGen\Renderer\Element  {

    class NamespaceBlock extends AbstractElement {

        public function render()
        {
            $output = array();
            $output[] = $this->_fs->H2($this->_elementName);

            foreach($this->_data as $className=>$classDetails)
            {
                //Class name
                $output[] = $this->_fs->H3($className);

                //Classes
                $output[] = $this->_fs->Indented(
                    ClassBlock::create($this->_fs, $className, $classDetails)->render()
                );
            }

            return implode("\n", $output);
        }

    }

}