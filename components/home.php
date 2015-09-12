<?php
    session_start();

    if (empty($_SESSION["smart_card_auth_challenge"])) {
        $challenge = '';
        $hexChars = "0123456789abcdef";
        for ($i=0; $i < 40; $i++) {
            $challenge .= $hexChars[rand(0, 15)];
        }
        $_SESSION["smart_card_auth_challenge"] = $challenge;
    }
?>

<div id="home_page" data-bind="if: loaded, visible: nav.currentView.view() == view && loaded">
    <div class="well">
        <div class="row">
            <div class="col-md-12">
                <h2>Kiwi Network</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" data-bind="click: login">Login</button>
                <label><span>Random challenge</span> <input id="smart_card_auth_challenge" disabled="disabled" value="<?php echo $_SESSION["smart_card_auth_challenge"]; ?>"></label>
                <p id="smart_card_auth_result"></p>
            </div>
        </div>
    </div>
</div>