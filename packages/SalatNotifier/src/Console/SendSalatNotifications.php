<?php

namespace SalatNotifier\Console;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class SendSalatNotifications extends Command
{
    protected $signature = 'salat:notify';
    protected $description = 'Send Salat time notifications to Slack.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $client = new Client();
        $slackToken = env('SLACK_TOKEN');
        $channel = '#salat-times';
        $message = 'It is time for Salat!';

        
        $salatTimes = \DB::table('salat_times')->latest()->first();

        $times = [
            'Fajr' => $salatTimes->fajr,
            'Dhuhr' => $salatTimes->dhuhr,
            'Asr' => $salatTimes->asr,
            'Maghrib' => $salatTimes->maghrib,
            'Isha' => $salatTimes->isha,
        ];

        foreach ($times as $name => $time) {
            if (now()->format('H:i') == \Carbon\Carbon::parse($time)->subMinutes(10)->format('H:i')) {
                $client->post('https://slack.com/api/chat.postMessage', [
                    'json' => [
                        'channel' => $channel,
                        'text' => "$message $name time is at $time.",
                    ],
                    'headers' => [
                        'Authorization' => "Bearer $slackToken",
                    ],
                ]);
            }
        }
    }
}
