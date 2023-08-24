<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pending Laundry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: rgb(105, 255, 173)">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pendings.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">METODE CLEANING</label>
                                <select class="form-control" name="typesId">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{ ($type->id==$record->typesId)? "selected" : "" }}> {{$type->nama}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <label class="font-weight-bold">WEIGHT</label>
                            <div class="form-group">
                                    <input type="text" class="form-control d-inline w-25 mr-2 @error('weight') is-invalid @enderror" name="weight" value="{{ $record->weight }}" placeholder="Masukkan Berat Laundry"> kg
                                <div class="font-weight-light"><i>*weight must be lower than 5 kg</i></div
                                <!-- error message untuk content -->
                                @error('weight')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">MILIK</label>
                                <input type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" value="{{ $record->owner }}" placeholder="Masukkan Pemilik Laundry">
                            
                                <!-- error message untuk content -->
                                @error('owner')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="{{ route('pendings.index') }}" class="btn btn-md btn-secondary">KEMBALI<a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>