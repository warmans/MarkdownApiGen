<?php
namespace MarkdownApiGen\RenderStrategy  {

    /**
     * Abstract Render Strategy
     *
     * Defined the interface for a renderer.
     *
     * @author Stefan
     */
    abstract class AbstractRenderer {

        abstract public function H1($text);

        abstract public function H2($text);

        abstract public function H3($text);

        abstract public function Pre($text);

        abstract public function Php($code);

        abstract public function Label($word);

        abstract public function Indented($text);

        abstract public function Strong($text);

        abstract public function italic($text);

        abstract public function Paragraph($text);

        abstract public function UnorderedListStart();

        abstract public function UnorderedListItem($line);

        abstract public function UnorderedListEnd();

        abstract public function Hr();

    }

}