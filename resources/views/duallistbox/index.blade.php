@extends('layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('duallistbox/icon_font/css/icon_font.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('duallistbox/css/jquery.transfer.css?v=0.0.3') }}" />
    <style>
        .transfer-demo {
            width: 640px;
            height: 400px;
            margin: 0 auto;
        }
    </style>
@endpush
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('duallistbox/js/jquery.transfer.js?v=0.0.6') }}"></script>
    <script>
        var groupDataArray1 = [
            {
                "groupName": "China",
                "groupData": [
                    {
                        "city": "Beijing",
                        "value": 122
                    },
                    {
                        "city": "Shanghai",
                        "value": 643
                    },
                    {
                        "city": "Qingdao",
                        "value": 422
                    },
                    {
                        "city": "Tianjin",
                        "value": 622
                    }
                ]
            },
            {
                "groupName": "Japan",
                "groupData": [
                    {
                        "city": "Tokyo",
                        "value": 132
                    },
                    {
                        "city": "Osaka",
                        "value": 112
                    },
                    {
                        "city": "Yokohama",
                        "value": 191
                    }
                ]
            }
        ];

        var settings3 = {
            "groupDataArray": groupDataArray1,
            "groupItemName": "groupName",
            "groupArrayName": "groupData",
            "itemName": "city",
            "valueName": "value",
            "callable": function (items) {
                console.dir(items)
                console.log(items)

            }
        };

        $("#transfer3").transfer(settings3);
    </script>

@endpush

@section('content')
    <div>
        hallo
        <div id="transfer3" class="transfer-demo"></div>
        <label for="">dual listbox</label>
        <input type="text" name="dual" id="dual">
    </div>
@endsection
