MarkdownApiGen
==============

Tool for generating API Documentation in GitHub Markdown format from a PSR-0 Compatible PHP Library.

Generated API docs look like this:

https://github.com/warmans/ClosureForm/blob/master/Docs.md

How to use
---------------
1. Edit Cli/config.ini
2. Execute Cli/run.php

Todo
---------------
- Support for namespace/class index at head of document.
- Support for link-type attributes in markdown.
- Support for @example annotation.
- Better validation of files (currently all classes are assumed to be classes with a .php extension).
- Improve CLI to support multiple profiles (e.g. a block for each library).
- Unit tests for Renderer classes.
- Generic Markdown class for GitHubMarkdown to extend.
- Test against BitBucket markdown.

Issues
---------------
- Large number of potential issues due to low unit test coverage and difficulty accounting for unusual docblock scenarios.
- No support of multi-line @annotations e.g. @example (though description can be multi-line and include code markdown.
- Memory usage has not been optimised (this would only cause an issue on a very large library).