<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel Form Validation Example</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Laravel Form Validation</h2>
                    </div>
                </div>
            </div>
            <form action="{{ url('save') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Name</label>
                    <input class="form-control" name="name" placeholder="Enter name" type="text">
                    @if ($errors->has('name')) 
                    <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" value="{{Request::old('email')}}" placeholder="Enter email" type="email">
                    @if ($errors->has('email')) 
                    <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i> Save
                </button>
            </form>         
        </div>
    </div>     
</body>
</html>