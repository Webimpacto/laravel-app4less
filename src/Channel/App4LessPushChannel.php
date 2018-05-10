<?php

namespace Webimpacto\LaravelApp4Less\Channel;

use Illuminate\Notifications\Notification;
use Webimpacto\App4Less\Client;
use Webimpacto\LaravelApp4Less\Models\App4Less;

class App4LessPushChannel
{
    /** @var \Webimpacto\App4Less\Client */
    protected $client;


    public function __construct()
    {
        $config = config('app4less');
        $this->client = new Client($config['user'],$config['api_key']);
    }

    /**
     * Send the given notification.
     *
     * @param  mixed $notifiable
     * @param  \Illuminate\Notifications\Notification $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $subscriptions = App4Less::where(['id_user'=>$notifiable->id,'active'=>1])->get();

        $payload = $notification->toApp4LessPush($notifiable, $notification)->toArray();

        $subscriptions->each(function ($sub) use ($payload) {
            $this->client->sendPushNotification(
                $sub->token,
                $payload['title'],
                $payload['url'],
                $payload['utm']
            );
        });
    }

}