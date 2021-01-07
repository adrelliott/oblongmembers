<h1>This is all the brands:</h1>
<ul>
    @forelse($brands as $brand)
        <li>{{ $brand->id }}: {{ $brand->brand_name }}</li>
    @empty
        <p>No Brands yet</p>
    @endforelse
</ul>
