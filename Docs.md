Docs
====
MarkdownApiGen\Util
-------------------
### Code ###
>    Code Util
>    
>    Parse raw code.
>    
>    
>    `Author : warmans`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **getClassName**( $code )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **getNamespace**( $code )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **getInterfaceName**( $code )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **isNamespaced**( $code )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **braceNamespace**( $code )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **removePhpDelimiters**( $code )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **removeBlockComments**( $code )</pre>
>    
>    
>    

MarkdownApiGen\Renderer\Formatter
---------------------------------
### Markdown ###
>    Markdown Strategy s .md documents.
>    
>    
>    `Author : Stefan`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **H1**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **H2**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **H3**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Pre**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Php**( $code )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Label**( $word )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Strong**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **italic**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Paragraph**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **UnorderedListStart**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **UnorderedListItem**( $line )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **UnorderedListEnd**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Indented**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Hr**(  )</pre>
>    
>    
>    

### GitHubMarkdown ###
>    GitHub Markdown Strategy s .md documents.
>    
>    
>    `Todo : Figure out where github md differs from the md standard`
>    
>    
>    `Author : Stefan`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **H1**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **H2**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **H3**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Pre**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Php**( $code )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Label**( $word )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Strong**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **italic**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Paragraph**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **UnorderedListStart**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **UnorderedListItem**( $line )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **UnorderedListEnd**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Indented**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Hr**(  )</pre>
>    
>    
>    

### AbstractStrategy ###
>    Abstract Formatter Strategy. The methods a formatter must implement to be used as a formatter strategy.
>    
>    
>    `Author : Stefan`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **H1**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **H2**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **H3**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Pre**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Php**( $code )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Label**( $word )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Indented**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Strong**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **italic**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Paragraph**( $text )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **UnorderedListStart**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **UnorderedListItem**( $line )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **UnorderedListEnd**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **Hr**(  )</pre>
>    
>    
>    

MarkdownApiGen\Renderer\Element
-------------------------------
### PageBlock ###
>    A page is the highest level of a rendered API. Pages contain namespaces.
>    
>    
>    `Author : Stefan`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **render**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **__construct**( MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy, $elementName, array $data )</pre>
>    
>    
>    
>    `Param Note: $libDataCache all package data`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **create**( MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy, type $elementName, array $data )</pre>
>    
>    
>    >    Factory
>    
>    `Return : \static `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **setConfig**( array $config )</pre>
>    
>    
>    >    Allows static config to be set in element parent class (i.e. all elements have access to it)
>    
>    `Return : \MarkdownApiGen\Renderer\Element\AbstractElement `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **config**( $name )</pre>
>    
>    
>    

### NamespaceBlock ###
>    Namespace Block. Renders everything at a namespace level
>    
>    
>    `Author : Stefan`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **render**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **__construct**( MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy, $elementName, array $data )</pre>
>    
>    
>    
>    `Param Note: $libDataCache all package data`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **create**( MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy, type $elementName, array $data )</pre>
>    
>    
>    >    Factory
>    
>    `Return : \static `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **setConfig**( array $config )</pre>
>    
>    
>    >    Allows static config to be set in element parent class (i.e. all elements have access to it)
>    
>    `Return : \MarkdownApiGen\Renderer\Element\AbstractElement `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **config**( $name )</pre>
>    
>    
>    

### MethodBlock ###
>    Namespace Block. Renders everything at a namespace level
>    
>    
>    `Author : Stefan`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **render**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **__construct**( MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy, $elementName, array $data )</pre>
>    
>    
>    
>    `Param Note: $libDataCache all package data`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **create**( MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy, type $elementName, array $data )</pre>
>    
>    
>    >    Factory
>    
>    `Return : \static `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **setConfig**( array $config )</pre>
>    
>    
>    >    Allows static config to be set in element parent class (i.e. all elements have access to it)
>    
>    `Return : \MarkdownApiGen\Renderer\Element\AbstractElement `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **config**( $name )</pre>
>    
>    
>    

### ClassBlock ###
>    Namespace Block. Renders everything at a namespace level
>    
>    
>    `Author : Stefan`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **render**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **__construct**( MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy, $elementName, array $data )</pre>
>    
>    
>    
>    `Param Note: $libDataCache all package data`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **create**( MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy, type $elementName, array $data )</pre>
>    
>    
>    >    Factory
>    
>    `Return : \static `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **setConfig**( array $config )</pre>
>    
>    
>    >    Allows static config to be set in element parent class (i.e. all elements have access to it)
>    
>    `Return : \MarkdownApiGen\Renderer\Element\AbstractElement `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **config**( $name )</pre>
>    
>    
>    

### AbstractElement ###
>    AbstractElement
>    
>    
>    `Author : Stefan`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **__construct**( MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy, $elementName, array $data )</pre>
>    
>    
>    
>    `Param Note: $libDataCache all package data`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **create**( MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy, type $elementName, array $data )</pre>
>    
>    
>    >    Factory
>    
>    `Return : \static `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **setConfig**( array $config )</pre>
>    
>    
>    >    Allows static config to be set in element parent class (i.e. all elements have access to it)
>    
>    `Return : \MarkdownApiGen\Renderer\Element\AbstractElement `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **config**( $name )</pre>
>    
>    
>    

MarkdownApiGen
--------------
### PathMap ###
>    Get a list of paths and file names.
>    
>    
>    `Author : warmans`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **__construct**( string $basePath, [string $excludeExtension] )</pre>
>    
>    
>    >    Scan the supplied directory for files (recursive).
>    
>    `Param Note: $excludeExtension defaults to '.php'. `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **getMap**(  )</pre>
>    
>    
>    >    Get the mapping
>    
>    `Return : array `
>    
>    

### Parser ###
>    Parses files into memory ready for rendering as markdown.
>    
>    
>    `Author : warmans`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **__construct**( $outputDir, MarkdownApiGen\Renderer\Formatter\AbstractStrategy $formatStrategy, $apiName )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **setConfig**( array $config )</pre>
>    
>    
>    >    Add additional config to the parser
>    
>    
>    -----------------
>    
>    <pre>`public` **getErrors**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **parsePackage**( string $packageRoot, string $namespace )</pre>
>    
>    
>    >    Parse a package and return the rendered api document as a string.
>    

### DocBlock ###
>    Process a dockblock to allow simple access of it's parts
>    
>    
>    `Author : warmans`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **__construct**( $rawDocBlock )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **getDescription**(  )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **getAnnotation**( $type )</pre>
>    
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **getAnnotations**(  )</pre>
>    
>    
>    

MarkdownApiGen\Cli\Lib
----------------------
### SplClassLoader ###
>    SplClassLoader implementation that implements the technical interoperability
>    standards for PHP 5.3 namespaces and class names.
>    
>    http://groups.google.com/group/php-standards/web/final-proposal
>    
>    // Example which loads classes for the Doctrine Common package in the
>    // Doctrine\Common namespace.
>    $classLoader = new SplClassLoader('Doctrine\Common', '/path/to/doctrine');
>    $classLoader->register();
>    
>    
>    `Author : Fabien Potencier <fabien.potencier@symfony-project.org>`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **__construct**( [string $ns], [$includePath] )</pre>
>    
>    
>    >    Creates a new <tt>SplClassLoader</tt> that loads classes of the
>    >    specified namespace.
>    
>    `Param Note: $ns The namespace to use.`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **setNamespaceSeparator**( string $sep )</pre>
>    
>    
>    >    Sets the namespace separator used by classes in the namespace of this class loader.
>    
>    `Param Note: $sep The separator to use.`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **getNamespaceSeparator**(  )</pre>
>    
>    
>    >    Gets the namespace seperator used by classes in the namespace of this class loader.
>    
>    `Return : void `
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **setIncludePath**( string $includePath )</pre>
>    
>    
>    >    Sets the base include path for all class files in the namespace of this class loader.
>    
>    
>    -----------------
>    
>    <pre>`public` **getIncludePath**(  )</pre>
>    
>    
>    >    Gets the base include path for all class files in the namespace of this class loader.
>    
>    `Return : string $includePath`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **setFileExtension**( string $fileExtension )</pre>
>    
>    
>    >    Sets the file extension of class files in the namespace of this class loader.
>    
>    
>    -----------------
>    
>    <pre>`public` **getFileExtension**(  )</pre>
>    
>    
>    >    Gets the file extension of class files in the namespace of this class loader.
>    
>    `Return : string $fileExtension`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **register**(  )</pre>
>    
>    
>    >    Installs this class loader on the SPL autoload stack.
>    
>    
>    -----------------
>    
>    <pre>`public` **unregister**(  )</pre>
>    
>    
>    >    Uninstalls this class loader from the SPL autoloader stack.
>    
>    
>    -----------------
>    
>    <pre>`public` **loadClass**( string $className )</pre>
>    
>    
>    >    Loads the given class or interface.
>    
>    `Param Note: $className The name of the class to load.`
>    
>    
>    `Return : void `
>    
>    

### Input ###
>    Input
>    
>    
>    `Author : Stefan`
>    
>    
>    
>    -----------------
>    
>    <pre>`public` **askUser**( $question )</pre>
>    
>    
>    
