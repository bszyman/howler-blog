<?php

namespace App\Models\Repositories;

use App\Models\Site;

class SiteStore
{
    public static function checkIfInitialized(): bool
    {
        return (Site::all()->count() > 0);
    }

    public static function fetchActiveConfig(): Site
    {
        return Site::orderBy("created_at")->first();
    }
}
