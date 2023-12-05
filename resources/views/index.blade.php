<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fanwiki</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="header">
    <h1>Index článkov</h1>
</div>

<div class="topnav">
    <a href="homepage.html">Fanwiki</a>
    <a class = "active" href="index.html">Index</a>
    <a href="addarticle.html">Pridať</a>
</div>
<div class = row>
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

<div class = footer>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
</body>
</html>
