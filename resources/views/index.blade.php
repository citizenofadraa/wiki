@extends("layouts.app")

@section("title", "Stiahnutia")

@section("content")

<div class = "row">
    <div class="tabulka" style="overflow-x:auto;">
        <table>
            <tr>
                <th>Názov</th>
                <th>Kategória</th>
                <th>Link</th>
            </tr>
            <tr>
                <td>Článok 1</td>
                <td>Kategória 1</td>
                <td><a href="article.html">Link</a></td>
            </tr>
        </table>
    </div>
</div>

<div class = "footer">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

@endsection
