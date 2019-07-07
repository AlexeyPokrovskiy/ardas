@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$product->name ?? ""}}">
</div>
<div class="form-group">
    <label for="">Cost</label>
    <input type="text" class="form-control" name="cost" placeholder="Cost" value="{{$product->cost ?? ""}}" >
</div>


<input type="submit" class="btn btn-primary" value="Send">
