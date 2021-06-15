<?php
require_once("PayPal-PHP-SDK/autoload.php");
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ARuz7rBr7dq3sjXGU0MMJ4NVMvE632rCHH_g-aojA89mdlLZaa8po9j6v1PKk-KN7DcR4X_v7yIrXJt7',     // ClientID
        'ENUkozwz5t2F1FsWYgLrM-cGaN-vX6j-QKwaAO9aHAdpZ8t6Qe8k0y7K7_-eKavlBc3IVEPFMWZA5TNc'      // ClientSecret
    )
);
?>