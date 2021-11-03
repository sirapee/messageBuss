<?php


namespace App\Repositories;
use App\Dto\PublishDto;
use App\Jobs\Publish;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\TopicRequest;
use App\Http\Requests\SubscriptionRequest;
use Illuminate\Support\Facades\Log;

class TopicRepository implements ITopicRepositoryInterface
{

    public function create(TopicRequest $request)
    {
        $name = str_replace(' ', '', $request->name);
        return createTopic($name);
    }

    public function subscribe(SubscriptionRequest $request, string $topic)
    {
        $topic = str_replace(' ', '', $topic);
        return subscribe($topic, $request->url);
    }

    public function publish(Request $request,string $topic)
    {
        $topicData = getTopicDetails($topic);
        if(!empty($topicData)){
            try {
                storePublish($topicData->id, json_encode($request->all(), JSON_THROW_ON_ERROR));

                $publishDto = new PublishDto();
                $publishDto->topicName = $topic;
                $publishDto->data = $request->all();
                $publishDto->topicId = $topicData->id;
                Publish::dispatch($publishDto)->delay(now()->addSecond(1));
            } catch (\Exception $e) {
                Log::info(json_encode($e));
            }
        }
    }
}
