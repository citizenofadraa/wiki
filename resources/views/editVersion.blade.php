@extends("layouts.app")

@section("title", "Stiahnutia")

@section("content")

    <div class="OneColumn">
        <form name="inputForm" action="{{route('updateVersion')}}" onsubmit="return validateText() && validateVersion()" method="post">
            @csrf
            <input type="hidden" name="cid" value="{{ $Info->id }}">
            <div class="form-group">
                <label for="">Verzia</label>
                <input name="verzia" value="{{ $Info->verzia }}"/>
            </div>
            <br>

            <div class="form-group">
                <label for="">Link</label>
                <input name="link" value="{{ $Info->link }}"/>
            </div>
            <br>

            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>

    <script>

        function validateText() {
            let x = document.forms["inputForm"]["link"].value;
            if (x === "") {
                alert("Text musí byť vyplnený");
                return false;
            }
        }

        function validateVersion() {
            let x = document.forms["inputForm"]["verzia"].value;
            if (x === "") {
                alert("Verzia musí byť vyplnená");
                return false;
            }
        }

    </script>

    <div class = "footer">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>

@endsection
