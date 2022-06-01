<?php

namespace Plusemon\Uploader\traits;

/**
 * Name     :   Easy File Upload and View Helpers
 * Author   :   Emon Khan
 * Date     :   12/05/2022
 */
trait HasUploader
{
    /**
     * Generate the url for specific file related to the model
     * 
     * @param string $property_name
     * @param string $type
     * @return string
     * 
     */
    public function urlOf($property_name, $type = 'image')
    {
        if (file_exists(public_path($this->$property_name))) return url($this->$property_name);

        $no_image_path = 'assets/web/images/no-image.png';
        if ($type == 'image') return url($no_image_path);
    }
}
