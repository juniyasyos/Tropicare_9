<section class="space-y-6">
    <form method="post" action="{{ route('profile.exit') }}" class="py-6">
        @csrf
        <div class="mt-6">
            <x-danger-button class="btn w-1/2 flex">
                {{ __('Logout') }}
            </x-danger-button>
        </div>
    </form>
</section>
