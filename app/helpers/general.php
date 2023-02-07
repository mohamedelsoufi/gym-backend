<?php

use App\Models\Permission;

const PAGINATION_COUNT = 15;

function successResponse( $msg, $data = [])
{
    return response()->json(['status' => 200, 'msg' => $msg, 'data' => $data], 200);
}

function failureResponse( $msg, $data = [])
{
    return response()->json(['status' => 400, 'msg' => $msg, 'data' => $data], 400);
}


function createdAtFormat($model)
{
    return date('d/m/Y - h:i A', strtotime($model));
}

function updatedAtFormat($model)
{
    return date('d/m/Y - h:i A', strtotime($model));
}

function permissionName()
{
    $permissions = Permission::all();
    $data = [];
    foreach ($permissions as $permission) {
        $data [] = $permission->name;
    }
    return implode('|', $data);
}

function settings(){
    $setting = \App\Models\Setting::first();
    if ($setting)
        return $setting;
    return '';
}
