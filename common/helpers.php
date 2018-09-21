<?php
/**
 * 方法文件
 */

/**
 * 将model->getErrors() 返回的数组转为字符串
 * @Author   Armo
 * @DateTime 2018-01-18
 * @param    array      $errors  model->getErrors()返回的数组
 * @param    string     $glue    分割符
 * @return   string              处理后的字符串
 */
function errorsToStr($errors, $glue='')
{
    foreach ($errors as &$val)
        $val = implode($glue, $val);
    return implode($glue, $errors);
}

if (YII_DEBUG) {
    function p($data)
    {
        echo '<pre>';
        print_r($data);
        echo '<pre>';
        die;
    }
}

/**
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function env($key, $default = null)
{

    $value = getenv($key) ?? $_ENV[$key] ?? $_SERVER[$key];

    if ($value === false) {
        return $default;
    }

    switch (strtolower($value)) {
        case 'true':
        case '(true)':
            return true;

        case 'false':
        case '(false)':
            return false;
    }

    return $value;
}
