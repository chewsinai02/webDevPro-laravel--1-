@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add Food</h3>
        <form action="{{route('addFood')}}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="foodName">Food Name</label>
				<input class="form-control" type="text" id="foodName" name="foodName" required>
            </div>
            <div class="form-group">
				<label for="foodDescription">Description</label>
				<input class="form-control" type="text" id="description" name="description" required>
            </div>
            <div class="form-group">
				<label for="foodPrice">Price</label>
				<input class="form-control" type="number" id="foodPrice" name="foodPrice" min="0" required>
            </div>
            <div class="form-group">
				<label for="quantity">Quantity</label>
				<input class="form-control" type="number" id="quantity" name="quantity" min="0" required>
            </div>
            <div class="form-group">
				<label for="foodImage">Food Image</label>
				<input class="form-control" type="file" id="foodImage" name="foodImage" >
            </div>
            <div class="form-group">
				<label for="categoryName">Category</label>
				<select name="categoryName" id="categoryName" class="form-control">
                    <option value=""></option>
                    <option value="1">Drinks</option>
                    <option value="2">Snacks</option>
                    <option value="3">Chocolate</option>
                    <option value="4">Instant Noodle</option>
				</select>  
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>            
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection