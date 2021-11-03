<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Requests\TopicRequest;
use App\Repositories\ITopicRepositoryInterface;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    private $topic;
    public function __construct(ITopicRepositoryInterface $topicRepository)
    {
        $this->topic = $topicRepository;
    }

    public function create(TopicRequest $request){
        return response()->json($this->topic->create($request));
    }

    public function subscribe(SubscriptionRequest $request, $topic){
        return response()->json($this->topic->subscribe($request, $topic));
    }

    public function publish(Request $request,$topic){
        $this->topic->publish($request, $topic);
        return response()->json(['message' => "Published Successfully"]);
    }
}
