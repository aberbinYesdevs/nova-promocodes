<?php

namespace Zorb\NovaPromocodes;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use Zorb\NovaPromocodes\Resources\Promocode;

class PromocodesTool extends Tool
{
    /**
     * @var class-string
     */
    public $promocodeResource = Promocode::class;


    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('nova-promocodes', __DIR__.'/../dist/js/tool.js');
        Nova::style('nova-promocodes', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the menu that renders the navigation links for the tool.
     *
     * @param  Request  $request
     * @return mixed
     */
    public function menu(Request $request)
    {
        return MenuSection::make(__('Promocodes'))
            ->path('/promocodes')
            ->icon('shield-check');
    }
}
