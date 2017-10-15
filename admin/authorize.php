<?php
    require_once 'anet_php_sdk/AuthorizeNet.php';
    define("AUTHORIZENET_API_LOGIN_ID", "YOURLOGIN");
    define("AUTHORIZENET_TRANSACTION_KEY", "YOURKEY");
    $subscription = new AuthorizeNet_Subscription;
    $subscription->name = "PHP Monthly Magazine";
    $subscription->intervalLength = "1";
    $subscription->intervalUnit = "months";
    $subscription->startDate = "2011-03-12";
    $subscription->totalOccurrences = "12";
    $subscription->amount = "12.99";
    $subscription->creditCardCardNumber    = "6011000000000012";
    $subscription->creditCardExpirationDate= "2018-10";
    $subscription->creditCardCardCode      = "123";
    $subscription->billToFirstName         = "Rasmus";
    $subscription->billToLastName          = "Doe";

    // Create the subscription.
    $request = new AuthorizeNetARB;
    $response = $request->createSubscription($subscription);
    $subscription_id = $response->getSubscriptionId();
?>