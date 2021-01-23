<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sodinimas</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/1stlesson/folder/garden-2/js/app.js" defer></script>
    <script>
        const apiUrl = 'http://localhost/1stlesson/folder/garden-2/sodinimas';
    </script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>


<header>
    <a href="sodinimas">Sodinimas</a>
    <a href="auginimas">Auginimas</a>
    <a href="skynimas">Skynimas</a>
</header>

<body>
    <h1>Darzoviu sodas </h1>
    <h2>Sodinimas </h2>
    <div id="error"></div>
    <form>
        <div id="list"></div>

        <input class="agurkas" type="text" name="kiekisC">
        <button class="sodintiAgurka" type="button" name="cucumber" id="cucumber">Sodinti agurką</button>
        <input class="paprika" type="text" name="kiekisP">
        <button class="sodintiPaprika" type="button" name="peper" id="peper">Sodinti paprika</button>
    </form>
</body>

</html>