<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pending Laundry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: rgb(105, 255, 173">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/laundrys/'.$record->image) }}" class="w-100 rounded">
                        <hr>
                        <h4 class="font-weight-bold">
                            LAUNDRY DETAIL
                        </h4>
                        <p class="h5 font-weight-normal">
                            Metode Cleaning : {{ $record->types->nama }}
                        </p>
                        <p class="h5 font-weight-normal">
                            Berat           : {{$record->weight}} kg
                        </p>
                        <p class="h5 font-weight-normal">
                            Milik           : {{$record->owner}}
                        </p>
                        <a href="{{ route('pendings.index') }}" class="btn btn-md btn-secondary">KEMBALI<a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>