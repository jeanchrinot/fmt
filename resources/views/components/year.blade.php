<div class="card card border-0 bg-transparent list-group-flush border-0 w-100">
    <div class="card-body p-0">
        <h3 class="text-capitalize">{{ $yearTitle }}</h3>
        <div class="list-group">
            @foreach ($years as $year)
            <a href="?year={{$year}}" class="list-group-item list-group-item-action @if(request()->get('year')==$year) active @endif">{{ $year }}</a>
            @endforeach
            {{-- <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                The current link item
            </a> --}}
        </div>
    </div>
</div>