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
        <td>titlde </td>
        <td>desc </td>
        <td>author_id </td>
        <td>assigned_id </td>
        <td>status_id </td>
    
        <td>edit </td>
        <td>delete </td>
    </tr>
    @foreach ($ticket as $ticket)
        <tr>
            <td>{{$ticket->id }}</td>
            <td>{{$ticket->titlde }}</td>
            <td>{{$ticket->desc }}</td>
            <td>{{$ticket->author_id }}</td>
            <td>{{$ticket->assigned_id }}</td>
            <td>{{$ticket->status_id }}</td>
         
            <td><a href="{{url("editicket")}}/{{$ticket->id}}">edit </a></td>
            <td><a href="{{url("deleteticket")}}/{{$ticket->id}}">delete </a></td>
        </tr>
    @endforeach
</table>
    

</body>
</html>