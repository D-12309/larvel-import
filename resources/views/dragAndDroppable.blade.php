<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Sortable - Connect lists</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #sortable1, #sortable2 {
            border: 1px solid #eee;
            width: 142px;
            min-height: 20px;
            list-style-type: none;
            margin: 0;
            padding: 5px 0 0 0;
            float: left;
            margin-right: 10px;
        }
        #sortable1 li, #sortable2 li {
            margin: 0 5px 5px 5px;
            padding: 5px;
            font-size: 1.2em;
            width: 120px;
        }
    </style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center pb-3 pt-1">Drag and Droppable Cards using Laravel 6 JQuery UI Example <span class="bg-success p-1">nicesnippets.com</span></h2>
            <div class="row">
                <div class="col-md-5 p-3 bg-dark offset-md-1">
                    <ul class="list-group shadow-lg connectedSortable" id="sortable1">
                        @if(!empty($panddingItem) && $panddingItem->count())
                            @foreach($panddingItem as $key=>$value)
                                <li class="list-group-item" item-id="{{ $value->id }}">{{ $value->title }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-5 p-3 bg-dark offset-md-1 shadow-lg complete-item">
                    <ul class="list-group  connectedSortable" id="sortable2">
                        @if(!empty($completeItem) && $completeItem->count())
                            @foreach($completeItem as $key=>$value)
                                <li class="list-group-item " item-id="{{ $value->id }}">{{ $value->title }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#sortable1, #sortable2" ).sortable({
            connectWith: ".connectedSortable"
        }).disableSelection();
    } );

    $( ".connectedSortable" ).on( "sortupdate", function( event, ui ) {
        var panddingArr = [];
        var completeArr = [];

        $("#sortable1 li").each(function( index ) {
            panddingArr[index] = $(this).attr('item-id');
        });

        $("#sortable2 li").each(function( index ) {
            completeArr[index] = $(this).attr('item-id');
        });
        console.log(completeArr);
        console.log(panddingArr);
        $.ajax({
            url: "{{ route('update.items') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {panddingArr:panddingArr,completeArr:completeArr},
            success: function(data) {
                console.log('success');
            }
        });

    });
</script>
</body>
</html>