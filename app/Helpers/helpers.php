<?php

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;

/**
 * @param $languageFileEnum
 * @param $key
 * @param array $data
 * @return array|Application|Translator|string|null
 */
function translation($languageFileEnum, $key, array $data = [])
{
    return __($languageFileEnum.'.'.$key, $data);
}
