
<form action="{{url("updatetickets")}}" method="post">

@csrf

title<input type="text" name="title" value="{{$ticket->title}}"><br>
desc<input type="text" name="desc" value="{{$ticket->desc}}"><br>
author_id<input type="text" name="author_id" value="{{$ticket->author_id}}"><br>
assigned_id<input type="text" name="assigned_id" value="{{$ticket->assigned_id}}"><br>
status_id<input type="text" name="status_id" value="{{$ticket->status_id}}"><br>
<input type="hidden" name="id" value="{{$ticket->id}}"><br>
<input type="submit"  value="actualizar"> 
</form>