<!-- <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outine rounded-pill"><i class="bi bi-list"></i></a>
<a href="#" class="btn btn-outine rounded-pill"><i class="bi bi-list"></i></a> -->
<!-- <a href="{{ route('users.index') }}" class="btn btn-outline" ><i class="bi bi-people-fill"></i>Users</a> -->
<a href="{{ route('product.index') }}" class="btn btn-outline" ><i class="bi bi-box-seam-fill"></i>Products</a>
<a href="{{ route('transaction.index') }}" class="btn btn-outline" ><i class="bi bi-cash-coin"></i>Transaction</a>
<a href="{{ route('orders.index') }}" class="btn btn-outline" ><i class="bi bi-box-seam-fill"></i>Orders</a>
<a href="{{ route('kasir.index') }}" class="btn btn-outline" ><i class="bi bi-pc-display-horizontal"></i>Kasir</a>

<style>
     .btn-outline{
          border-color: #008B8B;
          color: #008B8B;
     }
     .btn-outline:hover{
          background-color: #008B8B;
          color: #fff;
     }
</style>