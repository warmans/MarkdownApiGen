<?php
/**
 * Namespace Block. Renders everything at a namespace level
 *
 * @author Stefan
 */
namespace MarkdownApiGen\Renderer\Element  {

    class ClassBlock extends AbstractElement {

        public function render()
        {
            $output = array();

            //Description
            $output[] = $this->_fs->Paragraph($this->_data['doc']->getDescription());

            //Annotations e.g. author
            foreach($this->_data['doc']->getAnnotations() as $annotationTag => $annotationValue)
            {
                $output[] = $this->_fs->Paragraph($this->_fs->Label(ucfirst($annotationTag)." : $annotationValue"));
            }

            //Methods
            foreach($this->_data['methods'] as $methodName=>$methodDetails)
            {
                //optionally skip internal methods
                if($this->config('public_methods_only') && ($methodDetails['visibility'] != 'public'))
                {
                    continue;
                }

                $output[] = $this->_fs->Hr();
                $output[] = MethodBlock::create($this->_fs, $methodName, $methodDetails)->render();
            }

            return implode("\n", $output);
        }

    }

}