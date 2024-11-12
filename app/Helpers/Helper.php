<?php


function uploadImage($folder, $image)
{
    if ($image == null) {
        return null;
    }

    $extension = strtolower($image->extension());
    $filename = time() . rand(100, 999) . '.' . $extension;
    $image->move($folder, $filename);
    
    return $filename;
}