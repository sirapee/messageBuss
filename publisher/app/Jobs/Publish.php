<?php

namespace App\Jobs;

use App\Dto\PublishDto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Publish implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $publish;
    public function __construct(PublishDto $publish)
    {
        $this->publish = $publish;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::table('subscribers')->where('topic_id', $this->publish->topicId)
            ->chunkById(5, function ($subscribers) {
                foreach ($subscribers as $subscriber) {
                    //Todo Send Notification
                    $data = ['topic' => $this->publish->topicName, 'data' => $this->publish->data];
                    Log::info($subscriber->url);
                    Log::info('data '. json_encode($data));
                    $response = Http::post($subscriber->url, $data);
                    Log::info('Response '. json_encode($response));

                }
            });
    }
}
