@if ($paginator->lastPage() > 1)
<div class="row flex justify-between items-center">
    <div class="pagination flex">
        @if ($paginator->onFirstPage())
        <button disabled
            class="flex items-center justify-center h-10 w-10 text-stone-500 hover:border hover:border-brand-600 hover:bg-brand-600 hover:text-white transition-colors">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        @else
        <a wire:click.prevent="prevPage"
            class="flex items-center justify-center cursor-pointer h-10 w-10 text-stone-500 border hover:border-brand-600 hover:bg-brand-600 hover:text-white transition-colors">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
        @endif

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <a wire:click.prevent="gotoPage({{ $i }})" 
            class="flex items-center justify-center cursor-pointer h-10 w-10 text-stone-500 border hover:border-brand-600 hover:bg-brand-600 hover:text-white transition-colors {{ $paginator->currentPage() == $i ? 'text-white border-brand-600 bg-brand-600' : '' }}">
            {{ $i }}
        </a>
        @endfor

        @if ($paginator->hasMorePages())
        <a wire:click.prevent="nextPage"
            class="flex items-center justify-center cursor-pointer h-10 w-10 text-stone-500 border hover:border-brand-600 hover:bg-brand-600 hover:text-white transition-colors">
            <i class="fa-solid fa-chevron-right"></i>
        </a>
        @else
        <button disabled
            class="flex items-center justify-center h-10 w-10 text-stone-500 border hover:border-brand-600 hover:bg-brand-600 hover:text-white transition-colors">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
        @endif
    </div>
</div>
@endif
