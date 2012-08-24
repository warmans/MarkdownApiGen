<?php
/**
 * Namespace Block. Renders everything at a namespace level
 *
 * @author Stefan
 */
namespace MarkdownApiGen\Renderer\Element  {

    class MethodBlock extends AbstractElement {

        public function render()
        {
            $output = array();

            //Parse arguments to line
            $argumentLine  = array();
            foreach($this->_data['params'] as $param)
            {
                $paramTypeHint = $param['type'] ?: $this->_getParamTypeFromComment($param['name']);

                $paramDataString = trim($paramTypeHint.' $'.$param['name']);
                $argumentLine[] = ($param['required'] == 'required') ? $paramDataString : "[$paramDataString]";
            }

            //Method name and args
            $output[] = $this->_fs->Paragraph($this->_fs->Pre(
                $this->_fs->Label($this->_data['visibility']).' '.$this->_fs->strong($this->_elementName).'( '.implode(", ", $argumentLine).' )'
            ));

            //Method Description
            $output[] = ($this->_data['doc']->getDescription())
                ? $this->_fs->Indented($this->_data['doc']->getDescription())
                : '';

            //Method DocBlock
            $annotations = $this->_data['doc']->getAnnotations();

            //Param Notes
            if(isset($annotations['param']))
            {
                foreach($annotations['param'] as $paramNum => $paramAnnotation)
                {
                    $defaultVal = $this->_data['params'][$paramNum]['default_val'];
                    if($paramAnnotation['comment'] || $defaultVal)
                    {
                        $output[] = $this->_fs->Paragraph(
                            $this->_fs->Label(
                                'Param Note: '.$paramAnnotation['name'].($defaultVal ? " defaults to '$defaultVal'." : '').' '.$paramAnnotation['comment']
                            )
                        );
                    }
                }
                unset($annotations['param']);
            }

            //Any other annotations
            foreach($annotations as $name=>$value)
            {
                $value = is_array($value) ? implode(" ", $value) : $value;
                $output[] = $this->_fs->Paragraph(
                    $this->_fs->Label(ucwords($name)." : $value")
                );
            }



            return implode("\n", $output);
        }

        private function _getParamTypeFromComment($paramName)
        {
            $params = $this->_data['doc']->getAnnotation('param');
            if($params)
            {
                foreach($params as $param)
                {
                    if($param['name'] == '$'.$paramName)
                    {
                        return $param['type'];
                    }
                }
            }
            return FALSE;
        }

    }

}