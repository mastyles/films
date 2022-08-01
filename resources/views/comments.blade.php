@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All the comments</div>

                <div class="card-body">
                    <!-- Only logged in user can add a comment: -->
                    <a href="{{ URL::route('add-comment') }}" class="btn btn-primary mb-2{{ (!Auth::check() ? ' disabled' : '') }}" >Add Comment</a>
                    @if(!$data->isEmpty())
                        <table class="table table-striped table-dark table-bordered">
                            <tr>
                            <th>Film Name</th>
                            <th>Comment</th>
                            <th>Comment By</th>
                            <th>Commented On</th>
                            </tr>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->comment }}</td>
                                    <td>{{ $d->first_name }} {{ $d->last_name }}</td>
                                    <td>{{ $d->updated_at }}</td>
                                </tr>
                            @endforeach
                        </table>
                        <div id="pagination">
                            {{ $data->links() }}
                        </div>
                    @else
                        There are no comments.
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
