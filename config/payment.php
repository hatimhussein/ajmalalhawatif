<?php

use Modules\OrderModule\PaymentProviders\MyFatoorah;

return [
    'methods' => [
        'my_fatoorah' => [
            'is_online' => true,
            'is_basic' => true,
            'is_direct' => false,
            'provider' => MyFatoorah::class,
            'signature' => env('MYFATOORAH_SECRET_HASH', ''),
            'env' => env('MYFATOORAH_ENV', 'test'),
            'live' => [
                'api_token' => env('MYFATOORAH_SECRET_KEY'),
                'send_payment_url' => 'https://api.myfatoorah.com/v2/SendPayment',
                'get_payment_status' => 'https://api.myfatoorah.com/v2/GetPaymentStatus',
            ],
            'test' => [
                'api_token' => 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL',
                'send_payment_url' => 'https://apitest.myfatoorah.com/v2/SendPayment',
                'get_payment_status' => 'https://apitest.myfatoorah.com/v2/GetPaymentStatus',
            ],
        ]
    ]
];
