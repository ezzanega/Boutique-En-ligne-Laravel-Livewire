<div class="search-style-1">
    <form action="{{ route('product.search') }}">                                
        <input type="text" name="search" value="{{ $search }}" placeholder="Search for items...">
        <button type="submit"><i class="fi-rs-search"></i></button>
    </form>
</div>