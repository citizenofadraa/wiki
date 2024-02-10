@extends("layouts.app")

@section("title", "Fórum")

@section("content")

    <div class="row">
        <form name="inputForm" action="{{route('newpost')}}" method="post" onsubmit="return (validateText())" id="form">
            @csrf
            <div class="formdiv">
                <label>Používateľské meno</label><br>
                <input name="pouzivatel" type="text" class="form-control" value="{{Auth::user()->name}}" readonly><br>
                <label>Text</label><br>
                <textarea name="text" class="form-control"></textarea><br>
            </div>

            <div class = "form-group">
                <button type = "submit">Potvrdiť</button><br><br>
            </div>

        </form>
    </div>

    <table>
        @foreach ($posts as $item)
            <tr>
                <td><b>Používateľ:</b> {{$item->pouzivatel}}<br>
                    <b>Komentár:</b> {{$item->text}}<br>
                </td>
            </tr>
        @endforeach
    </table>

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
