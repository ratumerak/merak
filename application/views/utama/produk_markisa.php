 <div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-shopping-cart"></i> Order Produk Markisa</h6>
        </div>
        <div class="card-body">
            <div class="row">

             <?php echo $this->session->flashdata('message1') ?>
              
              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Produk Premium Markisa</h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <form method="post" action="">
                <input type="submit" class="btn btn-primary" name="kirim" value="Order markisa">
                </form>
              </div>
            </div>



        
        </div>
    </div>

</div>

