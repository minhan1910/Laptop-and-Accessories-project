<?php

function isRole($dataArr, $permissionName, $action = 'list')
{
    if (!empty($dataArr[$permissionName])) {
        $actionArr = $dataArr[$permissionName];
        if (!empty($actionArr) && in_array($action, $actionArr))
            return true;
    }
    return false;
}