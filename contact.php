<?php
require_once("inc/init.inc.php");
require_once("inc/header.inc.php");
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-warning text-white"><i class="fa fa-envelope"></i> CONTACT US.
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-warning text-white text-right">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-warning text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <p>3 rue de Rome</p>
                    <p>13001 MARSEILLE</p>
                    <p>France</p>
                    <p>Email : email@example.com</p>
                    <p>Tel. +33 12 56 11 51 84</p>

                </div>

            </div>
        </div>
    
        <!--Google map-->
        
        
    </div>
</div>



<?php
require_once("inc/footer.inc.php");