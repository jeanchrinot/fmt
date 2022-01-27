<div class="card border-0 rounded-lg m-0 w-100">
    <div class="card-body">
        <h5>Catégories</h5>

        <ul class="list-group">
            @foreach ($categories as $category)
                @if (count($category->$relation))
                    <li
                        class="list-group-item  border-top-0 border-left-0 border-right-0 d-flex justify-content-between align-items-center">
                        <a href="#" class="link">{{ $category->name }}</a>
                        <span class="badge badge-primary badge-pill">{{ count($category->$relation) }}</span>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
