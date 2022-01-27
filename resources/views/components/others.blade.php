<div class="card card border-0 bg-transparent border-0 w-100">
    <div class="card-body">
        <h5>Autres</h5>
        <div class="list-group">
            @foreach ($others as $other)
                <a href="/{{$base}}/{{$other->slug}}" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="card mb-3 w-100 border-0">
                        <div class="row no-gutters">
                            <div class="col-md-4 d-flex align-items-center">
                                <img class="img img-fluid" src="{{ getImage($other->$imageAttr) }}" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-text">
                                        {{ $other->$titleAttr }}
                                    </h6>
                                    {{ $slot }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>


    </div>
</div>
