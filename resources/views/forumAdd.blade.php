@extends("layouts.app")

@section("title", "Fórum")

@section("content")

    <div class="formdiv">
        <form name="inputForm" action="{{route('newForum')}}" onsubmit="return (validateText())" method="post" id="form">
            @csrf
            <div class="formdiv">
                <label>Používateľské meno</label><br>
                <input name="idAutora" type="text" class="form-control" value="{{Auth::user()->id}}" readonly><br>
                <label>Text</label><br>
                <textarea name="nazov" class="form-control"></textarea><br>
            </div>

            <div class = "form-group">
                <button type = "submit">Potvrdiť</button><br><br>
            </div>

        </form>
    </div>

    <script>

        function validateText() {
            let x = document.forms["inputForm"]["nazov"].value;
            if (x === "") {
                alert("Text musí byť vyplnený");
                return false;
            }
        }
    </script>

    <div class = footer>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>

@endsection
