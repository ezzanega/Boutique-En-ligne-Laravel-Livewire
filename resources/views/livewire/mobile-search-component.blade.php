<div class="mobile-search search-style-3 mobile-header-border">
    <form action="{{ route('product.search') }}">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search for items…">
        <button type="submit"><i class="fi-rs-search"></i></button>
    </form>
</div>