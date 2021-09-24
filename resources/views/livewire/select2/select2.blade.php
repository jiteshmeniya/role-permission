<div>
    <form wire:submit.prevent="store">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" wire:model="name" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Category</label>
                    <div wire:ignore>
                        <select id="category-dropdown" class="form-control" multiple wire:model="category">
                            @foreach($productList as $product)
                                <option value="{{$product}}">{{ $product }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>

    @include('livewire.select2.index')
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#category-dropdown').select2();
            $('#category-dropdown').on('change', function (e) {
                let data = $(this).val();
                 @this.set('category', data);
            });
            window.livewire.on('productStore', () => {
                $('#category-dropdown').select2();
            });
        });
    </script>
@endpush
