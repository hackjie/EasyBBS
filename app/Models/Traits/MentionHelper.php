<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Support\Facades\DB;

trait MentionHelper
{
    public $body_parsed;
    public $users = [];
    public $usernames;
    public $body_original;

    public function getMentionedUsername($content)
    {
        preg_match_all("/(\S*)\@([^\r\n\s]*)/i", $content, $atlist_tmp);
        $usernames = [];
        foreach ($atlist_tmp[2] as $k=>$v) {
            if ($atlist_tmp[1][$k] || strlen($v) >25) {
                continue;
            }
            $usernames[] = $v;
        }

        return array_unique($usernames);
    }

    public function replace()
    {
        $this->body_parsed = $this->body_original;

        foreach ($this->users as $user) {
            $search = '@' . $user->name;

            // 替换成 markdown 链接格式 []()
            // $place = '['.$search.']('.route('users.show', $user->id).')';

            $href = route('users.show', $user->id);

            // 替换成超链接 <a href=""></a> 格式
            $place = '<a href='.$href.'>'.$search.'</a>';

            $this->body_parsed = str_replace($search, $place, $this->body_parsed);
        }
    }

    public function parse($body)
    {
        $this->body_original = $body;
        $this->usernames = $this->getMentionedUsername($this->body_original);

        count($this->usernames) > 0 && $this->users = User::whereIn('name', $this->usernames)->get();

        $this->replace();
        return $this->body_parsed;
    }

    public function mentionUserIds()
    {
        $ids = '';
        foreach ($this->users as $user) {
            if (empty($ids)) {
                $ids = $user->id;
            } else {
                $ids = $ids.','.$user->id;
            }
        }
        return $ids;
    }
}