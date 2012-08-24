<?php
/**
 *A page is the highest level of a rendered API. Pages contain namespaces.
 *
 * @author Stefan
 */
namespace MarkdownApiGen\Renderer\Element  {

    class PageBlock extends AbstractElement {

        public function render()
        {
            $output = array();
            $output[] = $this->_fs->H1($this->_elementName);

            foreach($this->_data['namespaces'] as $namespace=>$classes)
            {
                $output[] = NamespaceBlock::create($this->_fs, $namespace, $classes)->render();
            }

            return implode("\n", $output);
        }
    }
}