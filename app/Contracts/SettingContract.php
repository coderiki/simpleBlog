<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 15.02.2019
 * Time: 17:46
 */

namespace App\Contracts;


interface SettingContract
{
    public function store($datas);

    public function destroy($id);

    public function update($id, $datas);
}