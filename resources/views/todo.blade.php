<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div>

    <div class="column" id="pending">

        <h1>All Tasks</h1>

        @foreach($pending_tasks as $task)

            <div class="list-group-item" data-id="{{ $task->id }}" draggable="true">{{ $task->name       }}</div>

        @endforeach

    </div>

    <div class="column" id="progress">

        <h1>In progress</h1>

        @foreach($progress_tasks as $task)

            <div class="list-group-item" data-id="{{ $progress_tasks }}" draggable="true">{{ $task->name }}</div>

        @endforeach
    </div>
</div>

<script src= "https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">

    $('.column').sortable({
        connectWith: '.column',
        ghostClass: "blue-background-class",

    });

    $('.list-group-item').click(function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        console.log(id);

        var status = $(this).parent().attr('id');

        $.ajax({
            url: "<?php echo URL('/update_task') ?>",
            data: 'status=' + status + '&id=' + id,
            type: "get",
            success: function (data) {
                alert(data);
            }
        });
    });

</script>
</body>
</html>