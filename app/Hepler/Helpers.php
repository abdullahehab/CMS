<?php
use Intervention\Image\Image;

 function uploadImage($request, $path = '/Posts')
{
    $newName = time() . $request->getClientOriginalName();
    Image::make($request)->resize(300, 300)->save(public_path($path.$newName));
    return $newName;
}