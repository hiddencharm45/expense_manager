<?php
if($image==NULL){
    // -----When no bill to show----
      echo "<div style='text-align:center;text-decoration:none'>
      <a href='#'>You don't have any bill</a></div>";}
   else{// --------To display the bill--------
   ?>
      <div style='text-align:center;text-decoration:none'>  
       <a href='#' data-toggle='modal' data-target='#myModal_<?php echo "$i";?>'>Show bill</a></div>

<!-- Modal -->
  <div class="modal fade in" id='myModal_<?php echo "$i";?>' role="dialog">
        <div class="modal-dialog">
    
      <!-- Modal content-->
            <div class="modal-content">
                    <div class="modal-header" style="color:white;background-color:rgb(57, 137, 125)">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="Text-align:center">Your Bill</h4>
                    </div>
                    <div class="modal-body">
                        <img src='img/<?php echo $image;?>' alt='Bill' ></img>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-block btn-change" data-dismiss="modal">Close</button>
                        
                    </div>
            </div>
      
        </div>
  </div>

 <?php  } ?>