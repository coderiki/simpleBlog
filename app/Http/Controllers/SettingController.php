<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\SettingRepository;
use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * @var SettingRepository
     */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {

        $this->settingRepository = $settingRepository;
    }

    public function edit()
    {
        $settings = $this->settingRepository->getSettings();
        return view('admin.editSetting', compact('settings'));
    }

    public function update(SettingRequest $settingRequest, $id)
    {

    }
}
