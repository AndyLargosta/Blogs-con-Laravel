<flux:dropdown position="bottom" align="start">
    <flux:sidebar.profile
        :name="auth()->user()->name"
        :initials="auth()->user()->initials()"
        icon:trailing="chevron-down"
        data-test="sidebar-menu-button"
    />

    <flux:menu>
        <flux:menu.radio.group>

            <flux:menu.item :href="route('admin.dashboard')" icon="key" wire:navigate>
                Admin
            </flux:menu.item>

            <flux:menu.item :href="route('settings')" icon="cog" wire:navigate>
                {{ __('Settings') }}
            </flux:menu.item>

            <flux:menu.separator />

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <flux:menu.item
                    as="button"
                    type="submit"
                    icon="arrow-right-start-on-rectangle"
                >
                    {{ __('Log Out') }}
                </flux:menu.item>
            </form>


        </flux:menu.radio.group>
    </flux:menu>
</flux:dropdown>
