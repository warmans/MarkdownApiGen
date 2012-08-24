MarkdownApiGen
==============

Tool for generating API Documentation in GitHub Markdown format from a PSR-0 Compatible PHP Library.

Generated API docs look like this:

https://github.com/warmans/ClosureForm/blob/master/Docs.md

How to use
---------------
1. Edit Cli/config.ini
2. Execute Cli/run.php

Issues
---------------
- Large number of potential issues due to low unit test coverage and difficulty accounting for unusual docblock scenarios.
- No support of multiline @annotations e.g. @example (though description can be multiline and include code markdown
- Memory usage has not been optimised. 