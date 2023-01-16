<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
  
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    {{-- End Bootstrap --}}

</head>
<body>
    <div class="container pt-5 " style="height: 100vh; width: 100%" >
        <img src="{{ asset('assets/img/404.jpg') }}" alt="" srcset="" width="300" class="d-block m-auto pt-2">
        <h4 class="text-center ">Anda tidak diperbolehkan mengakses halaman ini</h4>
        <div class="d-flex justify-content-center mt-3">
        <a href="/login" class="btn btn-primary "> Kembali</a>
        </div>
    </div>


</body>
</html>

    