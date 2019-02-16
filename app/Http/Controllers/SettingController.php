<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\SettingRepository;
use App\Http\Repositories\Fluent\ImageRepository;
use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * @var SettingRepository
     */
    private $settingRepository;
    /**
     * @var ImageRepository
     */
    private $imageRepository;

    public function __construct(SettingRepository $settingRepository, ImageRepository $imageRepository)
    {

        $this->settingRepository = $settingRepository;
        $this->imageRepository = $imageRepository;
    }

    public function edit()
    {
        $settings = $this->settingRepository->getSettings();
        return view('admin.editSetting', compact('settings'));
    }

    public function update(SettingRequest $settingRequest)
    {
        $data = $settingRequest->all();

        $this->settingRepository->update(1, $data);

        return redirect()->back()->withSuccess(__('general.transactionSuccessful'));

    }
}
