@extends('layouts.layout')

@section('content')
    <h3 class="text-center mt-4">
        All users links
    </h3>

    <div class="col-12">
        @if(session()->has('success'))
            <div class="text-center">
                <p class="text-success lead">{{session('success')}}</p>
            </div>
        @endif
    </div>
    <div class="row mt-4">
        @if(count($links))
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Link</th>
                    <th scope="col">Creation date</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($links as $link)
                    <tr>
                        <th scope="row">
                            {{$loop->index + 1}}
                        </th>
                        <td>
                            <a href="/redirect/{{$link->short_link}}" target="_blank">
                                {{$link->short_link}}
                            </a>
                        </td>
                        <td>{{$link->getLinkDate()}}</td>
                        <td>
                            <form action="{{route('admin.destroy', ['id' => $link->id])}}"
                                  method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No links yet...</p>
        @endif
    </div>
@endsection
