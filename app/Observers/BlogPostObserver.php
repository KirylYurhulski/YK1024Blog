<?php

namespace App\Observers;

use App\Models\BlogPost;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogPostObserver
{
    /**
     * Handle the blog post "creating" event.
     *
     * @param BlogPost $post
     * @return void
     */
    public function creating(BlogPost $post)
    {
        $post->user_id      = Auth::id();
        $post->slug         = Str::slug($post->title);
        $post->content_raw  = $post->content;
        $this->publishedAt($post);
    }

    /**
     * Handle the blog post "updating" event.
     *
     * @param  BlogPost $post
     * @return void
     */
    public function updating(BlogPost $post)
    {
        $post->user_id      = Auth::id();
        $post->slug         = Str::slug($post->title);
        $post->content_raw  = $post->content_html;
        $this->publishedAt($post);
    }

    /**
     * Set published_at val;ue for Post.
     *
     * @param  BlogPost $post
     * @return void
     */
    final private function publishedAt(BlogPost $post)
    {
        $post->published_at = null;
        if(empty($post->published_at) && ($post->is_published == 1)){
            $post->published_at = Carbon::now();
        }
    }
}
