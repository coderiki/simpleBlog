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

    public function store($datas);

    public function destroy($id);

    public function update($datas);

}