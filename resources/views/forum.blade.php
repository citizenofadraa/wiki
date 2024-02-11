@extends("layouts.app")

@section("title", "Fórum")

@section("content")

    <div class="formdiv">
        <a href="{{url('/forumAdd/')}}">Pridaj nové vlákno</a>
    </div>

    <table>
        @foreach ($forums as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->idAutora}}</td>
                <td class="editable" contenteditable="true">{{$item->nazov}}</td>
                <td><a href="chat/{{$item->id}}">Read</a></td>
                <td><a href="deleteForum/{{$item->id}}">Delete</a></td>
                <td><button class="btn btn-sm btn-primary save" data-id="{{ $item->id }}">Ulož zmeny</button></td>
            </tr>
        @endforeach
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/inline.js') }}"></script>

    <div class = footer>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>

@endsection
