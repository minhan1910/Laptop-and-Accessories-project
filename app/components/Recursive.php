<?php

namespace App\Components;

class Recursive
{
    private $data;
    private $htmlSelect = '';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecursive($selectedParentId, $parentId = 0, $text = '')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] === $parentId) {
                if (!empty($selectedParentId) && $value['id'] === $selectedParentId)
                    $this->htmlSelect .= '<option selected value="' . $value['id'] . '">' . $text . $value['name'] . '</option>';
                else
                    $this->htmlSelect .= '<option value="' . $value['id'] . '">' . $text . $value['name'] . '</option>';

                $this->categoryRecursive($selectedParentId, $value['id'], $text . '--');
            }
        }
        return $this->htmlSelect;
    }
}