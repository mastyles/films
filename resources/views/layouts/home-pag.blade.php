@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ URL::route('create-film') }}" class="btn btn-primary mb-2{{ (!Auth::check() ? ' disabled' : '') }}">Create Film</a>
                    @if(!$data->isEmpty())
                        <table class="table table-striped table-dark table-bordered">
                            <tr>
                                <th>Photo</th>
                                <th>Film Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Genre</th>
                                <th>Ticket Price</th>
                                <th>Country</th>
                                <th>Release Date</th>
                                <th>Manage</th>
                            </tr>
                            @foreach($data as $film)
                                <tr>
                                    <td>
                                        @if(!is_null($film->photo))
                                            <a href="{{url('/images/').'/'.$film->photo}}" target="_blank">
                                                <img src="{{url('/images/').'/'.$film->photo}}" alt="Image" title="{{ $film->name }}" width="200" height="100" />
                                            </a>
                                        @else
                                            <img src="{{url('/images/no-image.png')}}" alt="Image" width="100" height="100" />
                                        @endif
                                    </td>
                                    <td>{{ $film->name }}</td>
                                    <td>{{ $film->slug }}</td>
                                    <td>{{ $film->description }}</td>
                                    <td>{{ $film->genre }}</td>
                                    <td>{{ $film->ticket_price }}</td>
                                    <td>{{ $film->country }}</td>
                                    <td>{{ $film->release_date }}</td>
                                    <td>
                                        <form method="POST" action="/films/delete/{{ $film->id }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger{{ (!Auth::check() ? ' disabled' : '') }}">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div id="pagination">
                            {{ $data->links() }}
                        </div>
                    @else
                        Film record does not exist.
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
