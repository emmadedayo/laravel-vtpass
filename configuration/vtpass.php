<?php

    return [
        "username"          => env("VTPASS_USERNAME"),
        "password"          => env("VTPASS_PASSWORD"),
        // specify to use sandbox mode or live mode
        "mode"              => env("VTPASS_MODE", "sandbox"), // app mode sandbox ?? live
    ];
