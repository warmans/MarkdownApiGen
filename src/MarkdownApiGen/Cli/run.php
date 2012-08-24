<?php
namespace MarkdownApiGen\Cli {

    $configs = parse_ini_file(__DIR__.DIRECTORY_SEPARATOR.'config.ini', TRUE);
    $config = $configs['Input'];

    //config checking

    if(!$config['package_namespace'] || !$config['package_location'])
    {
        echo 'You must enter a namespace and package location';
        exit();
    }
    else {
        if(!file_exists($config['package_location']))
        {
            echo 'Package location does not exist';
            exit();
        }
    }

    //CLI needs an autoloader to use library

    include_once(__DIR__.DIRECTORY_SEPARATOR.'Lib/SplClassLoader.php');
    $loader = new Lib\SplClassLoader('MarkdownApiGen', realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'));
    $loader->register();

    $parser = new \MarkdownApiGen\Parser(
        $config['output_directory'],
        new \MarkdownApiGen\Renderer\Formatter\GitHubMarkdown(),
        $config['output_document_name']
    );

    //pass though user config
    $parser->setConfig($configs['Parser Config']);

    //Ensure consistent path
    $outputDirectory = trim($config['output_directory'], '/\\').DIRECTORY_SEPARATOR;

    //write file
    file_put_contents(
        "$outputDirectory{$config['output_document_name']}.md",
        $parser->parsePackage($config['package_location'],
        $config['package_namespace'])
    );

}