<div class="col-12 p-0">
    <div class="card m-0 w-100 border-0 border-0">
        <div class="card-body">
            <h5>Autres</h5>
            <div class="list-group">
                @foreach ($others as $other)
                    <a href="/{{ $baseUrl }}/{{ $other->slug }}" class="list-group-item list-group-item-action"
                        aria-current="true">
                        <div class="card w-100 border-0">
                            <div class="row no-gutters">
                                <div class="col-md-4  d-flex align-items-center">
                                    <img class="img img-fluid" src="{{ getImage($other->image) }}" alt="image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="card-text text-capitalize">
                                            {{ $other->title ?? $other->name }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
