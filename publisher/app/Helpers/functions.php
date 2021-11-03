<?php

use App\Models\Subscriber;
use App\Models\Topic;

function createTopic(string $topicName){
    return Topic::create([
        'topic_name' => $topicName
    ]);
}

function subscribe (string $topicName, string $url){
    $topicData = getTopicDetails($topicName);
    if(empty($topicData)){
        $topicData =  createTopic($topicName);
    }
    $subscription = new Subscriber([
        'url' => $url
    ]);
    $topicData->subscriptions()->save($subscription);

    return [
        'url' => $url,
        'topic' => $topicName
    ];
}

function storePublish (int $topicId, string $publishedData){

    return \App\Models\Publish::create([
        'published_data' => $publishedData,
        'topic_id' => $topicId
    ]);
}

function getTopicDetails (string $topicName){
    return Topic::where('topic_name', $topicName)->first();
}
