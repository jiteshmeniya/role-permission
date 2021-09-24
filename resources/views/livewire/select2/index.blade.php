<div>
    <table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>product</th>
                <th>category</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product )
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
            </tr>
            @empty
            no data
            @endforelse
        </tbody>
    </table>
</div>
