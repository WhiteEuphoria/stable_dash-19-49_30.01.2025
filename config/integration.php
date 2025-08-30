<?php

return [
    // Toggle demo/theme routes like /user, /enter, and static admin views.
    // Keep false in functional environments to rely on Filament panels.
    'theme_routes' => env('ENABLE_THEME_ROUTES', false),
];

