<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\Compiler;

/**
 * Class Compiler
 *
 * @author Romain Cottard
 */
class Compiler
{
    /** @var string  */
    private $copyright = '';

    /** @var string */
    private $rootDir = '';

    /** @var string[] */
    private $sources = [];

    /** @var string[] */
    private $exclude = [];

    /** @var string */
    private $distributionFile = '';

    /**
     * Compiler constructor.
     *
     * @param string $rootDir
     * @param array $config
     */
    public function __construct(string $rootDir, array $config)
    {
        $this->rootDir          = realpath($rootDir);

        $this->sources          = $config['src']       ?? ['/src', '/vendor/velkuns/codingame-core/src'];
        $this->exclude          = $config['exclude']   ?? ['/vendor/velkuns/codingame-core/src/Compiler'];
        $this->distributionFile = $config['dist']      ?? '/dist/codingame.php';
        $this->copyright        = $config['copyright'] ?? '';
    }

    /**
     * @return void
     */
    public function run(): void
    {
        $compiledCode = str_replace('#COMPILED_CODE#', $this->getCompiledCode(), $this->getTemplate());

        $this->write($compiledCode);

        $this->check();
    }

    /**
     * @return string
     */
    private function getCompiledCode(): string
    {
        echo 'Compiling: ... ';
        $compiled = '';

        foreach ($this->sources as $directory) {
            $fullPathname = $this->rootDir . '/' . $directory;

            $recursiveDirectoryIterator = new \RecursiveDirectoryIterator($fullPathname);

            foreach (new \RecursiveIteratorIterator($recursiveDirectoryIterator) as $file) {

                $filePathnameWithoutRoot = str_replace($this->rootDir, '', $fullPathname);
                if ($file->isDot() || $file->getExtension() !== 'php' || in_array($filePathnameWithoutRoot, $this->exclude)) {
                    continue;
                }

                $compiled .= $this->replaceHeader(
                    $this->read($file->getPathname()),
                    $filePathnameWithoutRoot,
                    $directory
                );
            }
        }

        echo 'done' . PHP_EOL;

        return $compiled;
    }

    /**
     * @param string $content
     * @param string $classFile
     * @param string $directory
     * @return string
     */
    private function replaceHeader(string $content, string $classFile, string $directory): string
    {
        $className = str_replace('/', '\\', trim(str_replace([$directory, '.php'], '', $classFile), '/'));
        $comment   = "\n// ============== ${className} ==============";
        $replace   = [
            '`<\?php`'                                                                                                                                                                                    => '',
            "`\/\*\n \* Copyright \(c\) $this->copyright\n \*\n \* For the full copyright and license information, please view the LICENSE\n \* file that was distributed with this source code\.\n \*\/`m" => $comment,
            "`namespace .+;`"                                                                                                                                                                             => '',
            "`use .+;`"                                                                                                                                                                                   => '',
            "`^\n+$`m"                                                                                                                                                                                    => '',
        ];

        return preg_replace(array_keys($replace), array_values($replace), $content);
    }

    /**
     * @param  string $file
     * @return string
     */
    private function read($file): string
    {
        return file_get_contents($file);
    }

    /**
     * @param  string $content
     * @return void
     */
    private function write($content): void
    {
        echo 'Writing: ... ';
        file_put_contents($this->distributionFile, $content);
        echo 'done' . PHP_EOL;
    }

    /**
     * @return void
     */
    private function check(): void
    {
        echo 'Checking syntax: ... ';
        $result = exec('php -l ' . $this->distributionFile, $content);

        if (substr($result, 0, 16) === 'No syntax errors') {
            echo 'OK' . PHP_EOL;
        } else {
            echo 'FAILED' . PHP_EOL . $result . PHP_EOL;
        }
    }

    /**
     * @return string
     */
    private function getTemplate(): string
    {
        return <<<TEMPLATE
<?php

/*
 * Copyright (c) $this->copyright
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

#COMPILED_CODE#

(new Application(new Game()))->run();
TEMPLATE;
    }
}
