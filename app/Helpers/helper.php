<?php

use App\Models\Setting;

if (!function_exists('getConfigValueFromSettingTable')) {
    function getConfigValueFromSettingTable($key_config)
    {
        $config = Setting::where('config_key', $key_config)->first();
        if ($config) {
            return $config->config_value;
        }
        return false;
    }
}
