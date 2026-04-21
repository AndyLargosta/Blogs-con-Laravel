<flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden mr-2" icon="bars-2" inset="left" />

    <x-app-logo href="{{ route('home') }}" wire:navigate />

    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:navbar.item icon="layout-grid" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
            {{ __('Home') }}
        </flux:navbar.item>
    </flux:navbar>

    <flux:spacer />

    <flux:navbar class="me-1.5 space-x-0.5 rtl:space-x-reverse py-0!">
        <flux:tooltip :content="__('Search')" position="bottom">
            <flux:navbar.item class="h-10! [&>div>svg]:size-5" icon="magnifying-glass" href="#" :label="__('Search')" />
        </flux:tooltip>

    </flux:navbar>

    @auth
        <x-desktop-user-menu>
        </x-desktop-user-menu>

        @else

            <flux:dropdown position="bottom" align="start">
                <flux:sidebar.profile
                    icon:trailing="chevron-down"
                    data-test="sidebar-menu-button"
                />

                <flux:menu>

                    <flux:menu.item :href="route('login')" wire:navigate>
                        {{ __('Log In') }}
                    </flux:menu.item>

                    <flux:menu.item :href="route('register')" wire:navigate>
                        {{ __('Register') }}
                    </flux:menu.item>

                </flux:menu>


            </flux:dropdown>



    @endauth

</flux:header>
