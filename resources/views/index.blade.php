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

    <div class="formdiv">
        <form name="inputForm" action="{{route('newVersion')}}" method="post" id="form">
            @csrf
            <div class="formdiv">
                <label>Verzia</label><br>
                <input name="verzia" type="text" class="form-control"><br>
                <label>Text</label><br>
                <textarea name="link" class="form-control"></textarea><br>
                <input name="datum" type="date">
            </div>

            <div class = "form-group">
                <button type = "submit">Potvrdiť</button><br><br>
            </div>

        </form>
    </div>

<div class = "footer">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

@endsection
