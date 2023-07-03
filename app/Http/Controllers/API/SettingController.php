<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $slider;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function __invoke(Request $request)
    {
        try {
            $settings = $this->setting->first();
            return successResponse(new SettingResource($settings), 'success', 200);
        } catch (\Exception $e) {
            return failureResponse([], __('message.something_wrong'), 400);
        }
    }
}
