


    <!--main header start -->
<?php
session_start();
include("include/db.php");
include("header.php");
?>


    <!--main header end -->

      <!-- main containt start -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10 col-xl-10 grid-margin stretch-card">
              <div class="row w-100 flex-grow">
                <div class="col-md-12 grid-margin ">
<?php if(isset($_GET['logged_in'])){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert"><h4>
  <strong>Hey..!</strong> <?php echo $_GET['logged_in']; unset($_GET['logged_in']); ?></h4>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
                <?php

if(isset($_GET['insert_product'])){

include("insert_product.php");

}

if(isset($_GET['view_products'])){

    include("view_products.php");
    
    }

    if(isset($_GET['edit_pro'])){

        include("edit_pro.php");
    }    
    
    if(isset($_GET['delete_pro'])){

      include("delete_pro.php");
  } 

if(isset($_GET['insert_cat'])){

        include("insert_cat.php");
    }   
    

    if(isset($_GET['view_cats'])){

        include("view_cats.php");
    }    
    
    if(isset($_GET['edit_cat'])){

        include("edit_cat.php");
    }    
   
    if(isset($_GET['delete_cat'])){

        include("delete_cat.php");
    }    
   
     if(isset($_GET['insert_brand'])){

        include("insert_brand.php");
    }    
    if(isset($_GET['view_brands'])){

        include("view_brands.php");
    }

    if(isset($_GET['edit_brand'])){

        include("edit_brand.php");
    }

    if(isset($_GET['delete_brand'])){

        include("delete_brand.php");
    }

    if(isset($_GET['view_customers'])){

        include("view_customers.php");
    }

    if(isset($_GET['delete_c'])){

        include("delete_customers.php");
    }

    if(isset($_GET['view_orders'])){

        include("view_orders.php");
    }
    if(isset($_GET['delete_order'])){

        include("delete_order.php");
    }

    if(isset($_GET['view_payments'])){

        include("view_payments.php");
    }
    


?>


                </div>
                
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
      <!-- main containt end -->


<?php

include("footer.php");

?>