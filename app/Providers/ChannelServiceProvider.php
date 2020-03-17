<?php

namespace App\Providers;

use App\Http\View\Composers\ChannelComposer;
use App\Models\Channel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ChannelServiceProvider extends ServiceProvider
{
    public function register()
    {
        # code...
    }

    public function boot()
    {
        // View::share('channels', Channel::orderBy('name')->get());

        // View::composer(
        //     [
        //         'channels.index', 
        //         'channels.posts.create'
        //     ], function($view) {
        //         $view->withChannels(Channel::orderBy('name')->get());
        // });

        View::composer([
            'channels.partials.*'
        ], ChannelComposer::class);
    }
}
