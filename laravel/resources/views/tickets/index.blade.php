<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@foreach ($test as $t)
    <p>{{ $t }}</p>
@endforeach

<a href="{{url("formAddticket")}}">añadir ticket </a>
<table>
    <tr>
        <td>id </td>
        <td>title </td>
        <td>desc </td>
        <td>author_id </td>
        <td>assigned_id </td>
        <td>status_id </td>

        <td>comment : author_id </td>
        <td>comment : ticket_id </td>
        <td>comment : msg </td>

        <td>status : name </td>

        <td>edit </td>
        <td>delete </td>
    </tr>
    @foreach ($tickets as $ticket && $comments as $comment && $statuses as $status )
        <tr>
            <td>{{$ticket->id }}</td>
            <td>{{$ticket->title }}</td>
            <td>{{$ticket->desc }}</td>
            <td>{{$ticket->author_id }}</td>
            <td>{{$ticket->assigned_id }}</td>
            <td>{{$ticket->status_id }}</td>
            <td>{{$comment->author_id }}</td>
            <td>{{$comment->ticket_id }}</td>
            <td>{{$comment->msg }}</td>
            <td>{{$status->name }}</td>
            <td><a href="{{url("editticket")}}/{{$ticket->id}}">edit </a></td>
            <td><a href="{{url("deleteticket")}}/{{$ticket->id}}">delete </a></td>
        </tr>
    @endforeach
</table>
    

</body>
</html>