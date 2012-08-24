<?php
namespace MarkdownApiGen\Cli\Lib {

    /**
     * Input
     *
     * @author Stefan
     */
    class Input {

        public function askUser($question)
        {
            echo $question;
            return trim(fgets(STDIN));
        }

    }

}