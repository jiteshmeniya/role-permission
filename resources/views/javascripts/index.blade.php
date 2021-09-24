@extends('layouts.app')
@section('content')
@push('style')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endpush
@push('script')
    <script>
        function multiplyBy()
        {
                num1 = document.getElementById("total").value;
                num2 = document.getElementById("total_ppn").value;
                document.getElementById("grand_total").innerHTML = num1 * num2;
        }

        function divideBy()
        {
                num1 = document.getElementById("total").value;
                num2 = document.getElementById("total_ppn").value;
        document.getElementById("grand_total").innerHTML = num1 / num2;
        }

        function equal()
        {
                num1 = document.getElementById("total").value;
                num2 = document.getElementById("total_ppn").value;


                var x = document.getElementById("total_ppn");
                if (x.style.display === "none") {
                    x.style.display = "block";
                    document.getElementById("total_ppn").value = num1 * 0.1;
                    document.getElementById("grand_total").value = num1 * 0.9;
                } else {
                    x.style.display = "none";
                    document.getElementById("total_ppn").value = 0;
                    document.getElementById("grand_total").value = num1;

                }
        }
    </script>
@endpush
<div class="container">
    <h3>Penjumlahan</h3>
    <form>
    1st Number : <input type="text" id="total" /><br>
    2nd Number: <input type="text" id="total_ppn" /><br>
    <input type="button" onClick="multiplyBy()" Value="Multiply" />
    <input type="button" onClick="divideBy()" Value="Divide" />
    <input type="button" onClick="equal()" Value="Equal" />
    </form>
    <p>The Result is : <br>
    {{-- <span id = "grand_total"></span> --}}
    Result: <input type="text" id="grand_total" /><br>
    </p>
</div>

@endsection
