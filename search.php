<?php
session_start();
include("includes/db.php");

$searchvalue = $_POST['searchvalue'];

$searchSQL="SELECT * FROM products WHERE product_title LIKE '%{$searchvalue}%' OR product_price LIKE '%{$searchvalue}%' OR product_keywords LIKE '%{$searchvalue}%'";
$runsearch = mysqli_query($con,$searchSQL);
if(mysqli_num_rows($runsearch) > 0){

while($rowsearch =mysqli_fetch_assoc($runsearch)){




?>
 <table id="searchvalue">
                            



                         
<tbody>
<tr>
<td class="font-weight-bold text-dark"><a href="view_all_pro.php?pid=<?php echo $rowsearch['product_id'];?>"><?php echo $rowsearch['product_title']; ?></a></td>
</tr>
</tbody>

</table>

<?php }  }else{ ?>

    <th><td class="font-weight-bold text-danger">No Result Found</td></th> 
    <?php } ?>