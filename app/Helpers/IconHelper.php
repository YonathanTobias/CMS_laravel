<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class IconHelper
{
    /**
     * Format class FontAwesome agar dijamin muncul 100% sempurna di FontAwesome Pro 6.7.0 & Free
     */
    public static function format(?string $icon, string $default = 'fa-solid fa-graduation-cap'): string
    {
        if (empty($icon)) {
            return $default;
        }

        $icon = trim($icon);

        // Biarkan seluruh prefix FontAwesome Pro (fa-sharp, fa-duotone, fa-thin, fa-light, dll) tetap utuh
        if (Str::startsWith($icon, ['fa-solid', 'fa-brands', 'fa-regular', 'fa-sharp', 'fa-duotone', 'fa-thin', 'fa-light', 'fa-pro', 'fal ', 'far ', 'fas ', 'fad ', 'fab ', 'fat '])) {
            return $icon;
        }

        if (Str::startsWith($icon, 'fa-')) {
            return 'fa-solid '.$icon;
        }

        return 'fa-solid fa-'.$icon;
    }
}
