@extends("layouts.app")

@section("title", "Fórum")

@section("content")

    <table>
        @forelse ($posts as $item)
            <tr>
                <td><b>Používateľ:</b> {{$item->pouzivatel}}<br>
                    <b>Komentár:</b> {{$item->text}}<br>
                </td>
                <td><a href="{{ url('/deletePost/'.$item->id) }}">Delete</a></td>
            </tr>
        @empty
            <tr>
                <td>No posts found for this forum</td>
            </tr>
        @endforelse
    </table>

    <div class="row">
        <form name="inputForm" action="{{route('newpost')}}" method="post" onsubmit="return (validateText())" id="form">
            @csrf
            <div class="formdiv">
                <input name="pouzivatel" type="text" class="form-control" value="{{Auth::user()->name}}" readonly style="display: none"><br>
                <input name="idFora" type="number" class="form-control" value="{{request('id')}}" readonly style="display: none"><br>
                <label>Text</label><br>
                <textarea name="text" class="form-control"></textarea><br>
            </div>

            <div class = "form-group">
                <button type = "submit">Potvrdiť</button><br><br>
            </div>

        </form>
    </div>

    <script>

        function validateText() {
            let x = document.forms["inputForm"]["text"].value;
            if (x === "") {
                alert("Text musí byť vyplnený");
                return false;
            }
        }
    </script>

@endsection
