<?php

namespace App\Components;

use App\Models\Permission;

class PermissionRecursive
{
    private $html;

    public function __construct()
    {
        $this->html = '';
    }
    public function permissionRecursiveAdd($parent_id = 0, $subMark = '')
    {
        $parentPermission = Permission::where('parent_id', $parent_id)->get();
        foreach ($parentPermission as $dataItem) {
            $this->html .= "<option value='" . $dataItem->id . "'>" . $subMark . $dataItem->name . "</option>";
            $this->permissionRecursiveAdd($dataItem->id, $subMark . '--');
        }
        return $this->html;
    }
}
