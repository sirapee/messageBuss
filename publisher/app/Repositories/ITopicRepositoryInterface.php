<?php


namespace App\Repositories;


use App\Http\Requests\SubscriptionRequest;
use App\Http\Requests\TopicRequest;
use Illuminate\Http\Request;

interface ITopicRepositoryInterface
{
    public function  create(TopicRequest $request);
    public function  subscribe(SubscriptionRequest $request, string $topic);
    public function  publish(Request $request , string $topic);

}
