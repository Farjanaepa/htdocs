<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>

<div class="container">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Catagory:
    </button>

 <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5 " id="exampleModalLabel">Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
            <div class="modal-body">

                       <form>
                            <div class="mb-3">
                                <label for="fCatagory" class="form-label">Catagory</label>
                                <input type="email" class="form-control" id="fCatagory" placeholder="Place inter your catagory">
                                
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
                </div>
            </div>
    </div>
</div>


<?php 
    include("includes/footer.php");
?>





