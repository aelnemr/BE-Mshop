@csrf

<script type="text/JavaScript">
    function createNewElement() {
        // First create a DIV element.
        var txtNewInputBox = document.createElement('div');
        txtNewInputBox.setAttribute('class','row');
        var formGroup =  document.createElement('div');
        formGroup.setAttribute('class','form-group col-6');
        txtNewInputBox.appendChild(formGroup);
        var label1 = document.createElement('label');
        label1.innerHTML = 'Products';
        formGroup.appendChild(label1);
        var selectProduct = document.createElement('select');
        selectProduct.setAttribute('class','form-control');
        selectProduct.setAttribute('id','product_id');
        selectProduct.setAttribute('name','product_id');
        formGroup.appendChild(selectProduct);
        selectProduct.innerHTML = ("@foreach ($orders as $order ) @foreach ($order->product as $orderDetail)<option>{{$orderDetail->name}} | {{$orderDetail->price}} $</option> @endforeach @endforeach");
        var quantityInput =  document.createElement('div');
        quantityInput.setAttribute('class','col-2');
        txtNewInputBox.appendChild(quantityInput);
        var label2 = document.createElement('label');
        label2.innerHTML = 'Quantity';
        quantityInput.appendChild(label2);
        var quantity = document.createElement('input');
        quantity.setAttribute('class','form-control');
        quantity.setAttribute('id','quantity');
        quantity.setAttribute('name','quantity');
        quantityInput.appendChild(quantity);

        // Finally put it where it is supposed to appear.
        document.getElementById("newElementId").appendChild(txtNewInputBox);
    }
    </script>
<div class="row">
    <div class="form-group col-6">
        <label for="product_id">Products</label>
        <select class="form-control" id="product_id" name="product-id">
            @foreach ($orders as $order )
            @foreach ($order->product as $orderDetail)

            <option value="{{$orderDetail->id}}">{{$orderDetail->name}} | {{$orderDetail->price}} $</option>
            @endforeach
            @endforeach

        </select>

    </div>

    <div class="col-2">
        <label for="quantity">Quantity</label>
        <input type="text" class="form-control" id="quantity" name="quantity"></div>
</div>
<div id="newElementId"></div>

<div id="dynamicCheck">
    <input type="button" value="Add Product" class="btn btn-primary" onclick="createNewElement();" />
</div>
<div class="form-group">
    name
    <input type="text" name="name" class="form-control">
</div>

<div class="text-center">
    <button type="submit" class="btn btn-success">Save</button>
</div>