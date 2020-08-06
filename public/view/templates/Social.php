<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Главная</title>
</head>
<body>
<?php
    if (!empty($contentView)) {
        $pathToView = APP_ABSOLUTE_PATH . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'Social' . DIRECTORY_SEPARATOR . $contentView . \Core\View::FILE_EXTENSION_PHP;
        if (file_exists($pathToView)) {
            include $pathToView;
        } else {
            throw new \Exception('View ' . $pathToView . ' absent');
        }
    }
?>
</body>
</html>
