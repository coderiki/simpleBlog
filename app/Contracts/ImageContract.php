<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 13.02.2019
 * Time: 16:22
 */

namespace App\Contracts;


interface ImageContract
{

    public function store($requestImage, $slug);

    public function destroy($mediaPath);

    public function update();

}