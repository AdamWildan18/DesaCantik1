<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layouts.link')
</head>
<body>
    <div class="container">
    <form action="/mail/send" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <label for="subject">Subject Mail</label>
                <input type="text" name="subject">

                <label for="sender">Email</label>
                <input type="text" name="sender">

                <label for="isi">Pesan</label>
                <textarea name="isi" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="sumit">
            <button type="submit">Simpan</button>
        </div>
    </form>
    </div>
</body>
</html>

