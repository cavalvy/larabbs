<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }

    public function saving(Topic $topic)
    {
        //调用config/purifier过滤XSS攻击
        $topic->body = clean($topic->body,'user_topic_body');
        $topic->excerpt = make_excerpt($topic->body);
    }
}