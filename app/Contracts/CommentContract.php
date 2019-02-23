<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 07.02.2019
 * Time: 09:22
 */

namespace App\Contracts;


interface CommentContract
{
    public function store($request);

    public function destroy($id);

    public function update($id, $request);
}