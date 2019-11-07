<?php
    function createClient() {
        $client = new Google_Client();
        $client->setApplicationName("Calendar");
        $client->setDeveloperKey('AIzaSyBXc4zC3a_9uMSL3eeZz7Qb9ywcRfAPOws');
        $client->setClientId('815853790118-t2qrhalqa341qvs80kssm2l9s1j6p7qd.apps.googleusercontent.com');
        $client->setClientSecret('-wd6zOobvn9E9aPLEJdDjM_u');
        $client->setRedirectUri("http://localhost/OOP/index.php/oauth2callback");
        return $client;
    }
?>