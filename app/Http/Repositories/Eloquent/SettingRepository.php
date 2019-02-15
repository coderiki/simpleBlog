<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 15.02.2019
 * Time: 17:47
 */

namespace App\Http\Repositories\Eloquent;


use App\Contracts\SettingContract;
use App\Setting;

class SettingRepository implements SettingContract
{

    /**
     * @var Setting
     */
    private $setting;

    public function __construct(Setting $setting)
    {

        $this->setting = $setting;
    }

    public function store($datas)
    {
        // TODO: Implement store() method.
        return $this->setting->create($datas);
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        return $this->setting->findOrFail($id)->delete();
    }

    public function update($id, $datas)
    {
        // TODO: Implement update() method.
        $setting =  $this->setting->findOrFail($id);
        return $setting->update($datas);
    }

    public function getSettings()
    {
        $settings = $this->setting->first();
        return $settings;
    }
}