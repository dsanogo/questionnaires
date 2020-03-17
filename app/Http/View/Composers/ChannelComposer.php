<?php

namespace App\Http\View\Composers;

use App\Models\Channel;
use Illuminate\View\View;

class ChannelComposer
{
    public function compose(View $view)
    {
        $view->withChannels(Channel::orderBy('name')->get());
    }
}
