<div id="profile_page" data-bind="if: loaded, visible: nav.currentView.view() == view && loaded">
    <div class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="input-group">
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="button">Go!</button>
		      </span>
                            <input type="text" class="form-control" placeholder="Search for...">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron jumbofirst">
            <div class="firstBox">
                <img src="assets/images/Picture.png" class="img-responsive" id="profilepicture"/><br />
                <b>Name: </b><span data-bind="text: homeVM.user_data()['firstName'] + ' ' + homeVM.user_data()['lastName']"</span>
                <b>ID Code: </b><span data-bind="text: homeVM.user_data()['identificationCode']"</span>
            </div>
        </div>



        <hr>
        <h1 class="lead" id="description">DESCRIPTION</h1>
        <div class="jumbotron text-center">
            <h2 class="BIO">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus dolore rem amet aut cum beatae illo nisi tenetur assumenda, dignissimos ratione. Ipsa deserunt aliquam voluptas, consectetur excepturi suscipit. Enim, consequuntur.</h2>
            <div class="btn btn-lg btn-success editBtn">Edit page</div>
        </div>

    </div> <!-- /container -->

    <?php require('components/chat.php'); ?>
</div>