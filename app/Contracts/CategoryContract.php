<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 07.02.2019
 * Time: 19:34
 */

namespace App\Contracts;


interface CategoryContract
{

    public function store($datas);

    public function destroy($id);

    public function update($datas);

}