<?php

use App\Models\SmsEmailNotification;

#one signal notification code to user
function OneSignalToUser($device_id, $notification)
{
    $ids = $device_id;
    $database = SmsEmailNotification::first();

    $fields =
        [
            'app_id' => $database->oneSignal_application_id,
            'include_player_ids' => [$ids],
            'data' => ["foo" => "bar"],
            'contents' => $notification
        ];

    $fields = json_encode($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic ' . $database->oneSignal_authorization));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);
}

#one signal notification code to all
function OneSignalToAll($notification)
{

    $database = SmsEmailNotification::first();

    $fields = array(
        'app_id' => $database->oneSignal_application_id,
        'included_segments' => array('All'),
        'data' => array("foo" => "bar"),
        'contents' => $notification
    );

    $fields = json_encode($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic ' . $database->oneSignal_authorization));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);
}

