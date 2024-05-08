<?php
require('config.ph');
$sql='select * from books';
$result=mysqli_query($connect,$sql);
if($result){
    while($row=mysqli_fetch_array($result)){
        ?>
       
            <div class="col-4" style="display:flex;gap:10px;">
        <p class="text-danger bg-white"><?php echo $row['id']; ?></p>
        <p class="text-light bg-warning"><?php echo $row['name']; ?></p>
        </div>
        <?php

    }
    
}
?>