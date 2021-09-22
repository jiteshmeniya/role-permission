<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel Dependent Dropdown  Tutorial With Example</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
</head>
<body>
    <div class="container">
        <h2>Laravel Dependent Dropdown  Tutorial With Example</h2>

        <div class="form-group">
          <label for="">tes</label>
          <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
            <div class="form-group">
                <label for="country">Select Country:</label>
                <select name="country" class="form-control" style="width:250px">
                    <option value="">--- Select Country ---</option>
                    @foreach ($countries as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="state">Select State:</label>
                <select name="state" class="form-control"style="width:250px">
                <option>--State--</option>
                </select>
            </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
                jQuery('select[name="country"]').on('change',function(){
                var countryID = jQuery(this).val();
                if(countryID)
                {
                    jQuery.ajax({
                        url : 'dropdownlist/getstates/' +countryID,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            console.log(data);
                            jQuery('select[name="state"]').empty();
                            jQuery.each(data, function(key,value){
                            $('select[name="state"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }
                else
                {
                    $('select[name="state"]').empty();
                }
                });
        });
    </script>

  </body>
</html>
