@extends("layouts.app")

@section("title", "Stiahnutia")

@section("content")

    <table>
        <tr>
            <th>ID</th>
            <th>Verzia</th>
            <th>Link</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($versions as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->verzia}}</td>
                <td><a href="{{$item->link}}">Link na stiahnutie</a></td>
                <td><a href=editVersion/{{$item->id}}>Upraviť</a></td>
                <td><a href=deleteVersion/{{$item->id}}>Zmazať</a></td>
            </tr>
        @endforeach
    </table>

<div class = "footer">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

@endsection
