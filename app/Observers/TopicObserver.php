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
        // 过滤话题里面的内容，防止 XSS
        $topic->body = clean($topic->body, 'user_topic_body');

        // 入库之前赋值 摘要字段
        $topic->excerpt = make_excerpt($topic->body);
    }
}