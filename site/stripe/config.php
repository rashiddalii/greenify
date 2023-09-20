<?php
require('stripe-php-master/init.php');

$publisKey= "pk_test_51N3O8CFCtn7lxo8cOE0WYqAoZv4sZLKkauHn5GWodNj4wtv05OhkygHwswWEeUjqF9yVJhh8KR3Qm0H98v0FHlnS00Vjy66dqK";

$secretKey= "sk_test_51N3O8CFCtn7lxo8cli6ukLUFyO0fhbUwYixM4o5pN1TvDouYd4TvWBEXAlrUIc0eUPAuK2p4kklbpXYOwCkKulSv00AtwXyyq1";

\Stripe\Stripe::setApiKey($secretKey);

?>