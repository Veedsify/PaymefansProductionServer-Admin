@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav class="p-3">
            {{-- Mobile view pagination --}}
            <div class="d-flex justify-content-between flex-fill d-sm-none">
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item">
                            <span class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base disabled">
                                <iconify-icon icon="ep:d-arrow-left" class="text-xl"></iconify-icon>
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <button type="button" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" 
                                    class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base" 
                                    wire:click="previousPage('{{ $paginator->getPageName() }}')" 
                                    x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                    wire:loading.attr="disabled">
                                <iconify-icon icon="ep:d-arrow-left" class="text-xl"></iconify-icon>
                            </button>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <button type="button" 
                                    dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" 
                                    class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base" 
                                    wire:click="nextPage('{{ $paginator->getPageName() }}')" 
                                    x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                    wire:loading.attr="disabled">
                                <iconify-icon icon="ep:d-arrow-right" class="text-xl"></iconify-icon>
                            </button>
                        </li>
                    @else
                        <li class="page-item">
                            <span class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base disabled">
                                <iconify-icon icon="ep:d-arrow-right" class="text-xl"></iconify-icon>
                            </span>
                        </li>
                    @endif
                </ul>
            </div>

            {{-- Desktop view pagination --}}
            <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                <div>
                    <p class="small text-muted mb-0">
                        {!! __('Showing') !!}
                        <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                        {!! __('of') !!}
                        <span class="fw-semibold">{{ $paginator->total() }}</span>
                        {!! __('results') !!}
                    </p>
                </div>

                <div>
                    <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <li class="page-item">
                                <span class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base disabled">
                                    <iconify-icon icon="ep:d-arrow-left" class="text-xl"></iconify-icon>
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <button type="button" 
                                        dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" 
                                        class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base" 
                                        wire:click="previousPage('{{ $paginator->getPageName() }}')" 
                                        x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                        wire:loading.attr="disabled">
                                    <iconify-icon icon="ep:d-arrow-left" class="text-xl"></iconify-icon>
                                </button>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="page-item disabled">
                                    <span class="page-link bg-primary-50 text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px">{{ $element }}</span>
                                </li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}">
                                            <span class="page-link bg-primary-600 text-white fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}">
                                            <button type="button" 
                                                    class="page-link bg-primary-50 text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px" 
                                                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" 
                                                    x-on:click="{{ $scrollIntoViewJsSnippet }}">{{ $page }}</button>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <li class="page-item">
                                <button type="button" 
                                        dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" 
                                        class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base" 
                                        wire:click="nextPage('{{ $paginator->getPageName() }}')" 
                                        x-on:click="{{ $scrollIntoViewJsSnippet }}" 
                                        wire:loading.attr="disabled">
                                    <iconify-icon icon="ep:d-arrow-right" class="text-xl"></iconify-icon>
                                </button>
                            </li>
                        @else
                            <li class="page-item">
                                <span class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base disabled">
                                    <iconify-icon icon="ep:d-arrow-right" class="text-xl"></iconify-icon>
                                </span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @endif
</div>