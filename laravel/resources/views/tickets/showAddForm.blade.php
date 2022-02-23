<form action="{{url("updatetickets")}}" method="post">

    @csrf
    
        titlde<input type="text" name="titlde" id=""><br>
        desc<input type="text" name="desc" id=""><br>
        author_id<input type="text" name="author_id" id=""><br>
        assigned_id<input type="text" name="assigned_id" id=""><br>
        status_id<input type="text" name="status_id" id=""><br>
       
        <input type="submit"  value="añadir"> 
    </form>