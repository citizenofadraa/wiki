@extends("layouts.app")

@section("title", "Fórum")

@section("content")

    <div class="row">
        <form name="inputForm" action="{{route('newpost')}}" method="post" onsubmit="return (validateAuthor() & validateText())" id="form">
            @csrf
            <div class="formdiv">
                <label>Používateľské meno</label><br>
                <input name="pouzivatel" type="text" class="form-control"><br>
                <label>Text</label><br>
                <textarea name="text" class="form-control"></textarea><br>
            </div>

            <div class = "form-group">
                <button type = "submit">Potvrdiť</button><br><br>
            </div>

        </form>
    </div>

    <script>

        function validateAuthor() {
            let x = document.forms["inputForm"]["pouzivatel"].value;
            if (x === "") {
                alert("Autor musí byť vyplnený");
                return false;
            }
        }

        function validateText() {
            let x = document.forms["inputForm"]["text"].value;
            if (x === "") {
                alert("Text musí byť vyplnený");
                return false;
            }
        }
    </script>

@endsection
