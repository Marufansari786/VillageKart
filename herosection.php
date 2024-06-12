<div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                  Search Item
                                  <i class="fa-thin fa-magnifying-glass"></i>
                                </div>
                                <input type="text" id="searchitem" placeholder="What do yo u need?">
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+91 12345678</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <!-- <datalist id="searchvalue"></datalist> -->
                    <table id="searchvalue">
                        </table>
                    <div class="hero__item set-bg" data-setbg="img/hero/banners.jpg">
                        <div class="hero__text">
                          
                            <!-- <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  

    <script>
$(document).ready(function(){

    $("#searchitem").on("keyup", function(){

        var searchvalue = $(this).val();

        $.ajax({
url : "search.php",
type: "POST",
data : {
    searchvalue : searchvalue
},

success : function(data){

    $('#searchvalue').html(data);
}
            

        });
    });


})

    </script>

    