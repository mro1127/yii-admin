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