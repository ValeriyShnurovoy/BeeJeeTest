<?php

namespace Core;

/**
 * View
 */
class View
{
    /** Php file extension */
    const FILE_EXTENSION_PHP = '.php';

    /**
     * @param string $contentView
     * @param array $data
     * @throws \Exception
     */
    public static function generate(string $contentView, array $data = [])
    {
        // преобразуем элементы массива в переменные
        extract($data);

        $templates = PUBLIC_ABSOLUTE_PATH . DIRECTORY_SEPARATOR . 'view'. DIRECTORY_SEPARATOR . $contentView . self::FILE_EXTENSION_PHP;
        if (file_exists($templates)) {
            include $templates;
        } else {
            throw new \Exception('Templates ' . $templates . ' absent');
        }
    }

}