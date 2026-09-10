<?php

namespace App\Helpers;

use App\Models\SiteSetting;
use Illuminate\Support\Str;

class IconHelper
{
    /**
     * Peta konversi ikon FontAwesome Pro ke versi FontAwesome Free 6
     */
    protected static array $proMap = [
        'files-medical' => 'file-medical',
        'file-medical-alt' => 'notes-medical',
        'hospital-user-alt' => 'hospital-user',
        'clinic-medical' => 'house-medical',
        'user-md' => 'user-doctor',
        'doctor' => 'user-doctor',
        'ambulance-side' => 'ambulance',
    ];

    /**
     * Format class FontAwesome agar dijamin muncul 100% di FontAwesome Free maupun Pro
     */
    public static function format(?string $icon, string $default = 'fa-solid fa-graduation-cap'): string
    {
        if (empty($icon)) {
            return $default;
        }

        $icon = trim($icon);

        // Jika FontAwesome Pro Kit diaktifkan di Admin Settings, biarkan class Pro mentah
        if (SiteSetting::get('fontawesome_pro_url')) {
            if (Str::startsWith($icon, ['fa-solid', 'fa-brands', 'fa-regular', 'fa-sharp', 'fa-duotone', 'fa-thin', 'fa-light'])) {
                return $icon;
            }
            if (Str::startsWith($icon, 'fa-')) {
                return 'fa-solid '.$icon;
            }

            return 'fa-solid fa-'.$icon;
        }

        // Hapus prefix Pro seperti fa-sharp, fa-duotone, fa-thin, fa-light
        $icon = str_replace(['fa-sharp ', 'fa-sharp', 'fa-duotone ', 'fa-duotone', 'fa-thin ', 'fa-thin', 'fa-light ', 'fa-light'], '', $icon);
        $icon = trim($icon);

        // Konversi nama ikon Pro ke nama ikon Free 6
        foreach (self::$proMap as $pro => $free) {
            if (Str::contains($icon, $pro) && ! Str::contains($icon, $free)) {
                $icon = str_replace($pro, $free, $icon);
            }
        }

        if (Str::startsWith($icon, ['fa-solid', 'fa-brands', 'fa-regular'])) {
            return $icon;
        }

        if (Str::startsWith($icon, 'fa-')) {
            return 'fa-solid '.$icon;
        }

        return 'fa-solid fa-'.$icon;
    }
}
