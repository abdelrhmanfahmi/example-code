<?php


function storeImage($image)
{
    $imageName = time().'.'.$image->extension();
    $image->storeAs('images', $imageName);
    return $imageName;
}
