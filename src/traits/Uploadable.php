<?php

namespace Plusemon\Uploader\traits;

/**
 * Name     :   Easy File Upload and View Helpers
 * Author   :   Emon Khan
 * Date     :   12/05/2022
 */
trait Uploadable
{
    /**
     * Upload file to the public media folder according to file type and the model
     * 
     * @param Illuminate\Http\UploadedFile $file
     * @param mixed $uid
     * @param string $module
     * @param string $type
     * @return mixed
     * 
     */
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
