<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 06.02.2019
 * Time: 18:25
 *
 * Interface tanımlamaları Contracts klasörü altında tutulacak.
 * Interface içinde tanımlanan fonksiyonlar public olur ve implements edecek sınıflar
 * bu fonksiyonları tanımlamak zorunda kalır.
 */

namespace App\Contracts;


interface PostContract
{

    public function store($datas);

    public function destroy($id);

    public function update($id, $datas, $deleteFile = null);

}