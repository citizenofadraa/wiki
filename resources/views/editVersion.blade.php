@extends("layouts.app")

@section("title", "Stiahnutia")

@section("content")

    <div class="formdiv">
        <form action="{{route('updateVersion')}}" method="post">
            @csrf
            <input type="hidden" name="cid" value="{{ $Info->id }}">
            <div class="form-group">
                <label for="">Verzia</label>
                <input name="verzia" value="{{ $Info->verzia }}"/>
            </div>

            <div class="form-group">
                <label for="">Link</label>
                <input name="link" value="{{ $Info->link }}"/>
            </div>

            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>

    <div class = "footer">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>

@endsection
