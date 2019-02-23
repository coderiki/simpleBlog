<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 19.02.2019
 * Time: 21:23
 */

namespace App\Contracts;


interface PageContract
{
    public function store($request);

    public function destroy($id);

    public function update($id, $request);

    public function show($slug);
}