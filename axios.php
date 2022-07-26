<?php
include('./vendor/autoload.php');

$stripe = new \Stripe\StripeClient("sk_test_51L8H0fSAdZbP750sOWAeLAxCblSk0j7SBvCxZfITlyjkDLv1jZ11JEIFWBb8gLaAJy2Tkr6I6qr9klQHyJd0qEjR00gj2fh31R");

$token = $stripe->tokens->create([
    'card' => [
      'number' => '4242424242424242',
      'exp_month' => 7,
      'exp_year' => 2023,
      'cvc' => '314',
    ],
  ]);

$res = $stripe->paymentIntents->create([
    'amount' =>100,
    'currency' => 'inr',
    'payment_method_types' => ['card'],
]);


$re_con = $stripe->paymentIntents->confirm(
    $res->id,
    [
    'payment_method_data' => [
        'type' => 'card',
        'card' => [
            'token' => $token->id
            ]
        ],
    'return_url' => 'http://localhost/Harman/php/stripe/'
    ],
);

echo json_encode($re_con);

?>