<x-filament::page>
    <form wire:submit.prevent="save" class="space-y-6">
        {{ $this->form }}

        <div class="flex justify-end gap-3 pt-6">
            <x-filament::button 
                tag="a" 
                href="/admin" 
                color="gray">
                Batal
            </x-filament::button>

            <x-filament::button type="submit">
                Simpan Perubahan
            </x-filament::button>
        </div>
    </form>
</x-filament::page>