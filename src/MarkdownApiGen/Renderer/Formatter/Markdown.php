<?php
namespace MarkdownApiGen\Renderer\Formatter {

    /**
     * Markdown Strategy s .md documents.
     *
     * @author Stefan
     */
    class Markdown extends AbstractStrategy {

        public function H1($text){
            return "$text\n".str_repeat('=', strlen($text));
        }

        public function H2($text){
            return "$text\n".str_repeat('-', strlen($text));
        }

        public function H3($text){
            return "### $text ###";
        }

        public function Pre($text){
            return "<pre>$text</pre>";
        }

        public function Php($code){
            return "```php $code ```";
        }

        public function Label($word){
            return "`$word`";
        }

        public function Strong($text){
            return "**$text**";
        }

        public function italic($text) {
            return "*$text*";
        }

        public function Paragraph($text) {
            return "$text\n\n";
        }

        public function UnorderedListStart(){
            return " ";
        }

        public function UnorderedListItem($line){
            return " * $line";
        }

        public function UnorderedListEnd(){
            return " ";
        }

        public function Indented($text){
            $output = array();

            $textLines = explode("\n", str_replace("\n\r", "\n", $text));
            foreach($textLines as $line){
                $output[] = ">    ".trim($line);
            }
            return implode("\n", $output)."\n";
        }

        public function Hr(){
            return "\n-----------------\n";
        }
    }

}