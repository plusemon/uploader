<?php

namespace Plusemon\Uploader;

use Illuminate\Database\Eloquent\Model;

class Uploader extends Model
{
    public function upload($file, $uid = null, $module = null, $type = 'images')
    {
        $module_name =  $module ?? $this->getTable();
        $unique_id = $uid ?? $this->id ?? uniqid();
        $file_name = $module_name . '-' . $unique_id . '.' . $file->extension();
        $dir = 'uploads/' . $type . '/' . $module_name . '/';

        $save = $file->move(public_path($dir), $file_name);

        $file_path = $dir . $file_name;
        return $save ? $file_path : null;
    }
}
