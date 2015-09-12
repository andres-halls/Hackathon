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
    <input type="hidden" id="smart_card_auth_challenge" disabled="disabled" value="<?php echo $_SESSION["smart_card_auth_challenge"]; ?>"/>

    <div class="container-fluid">
        <div class="heroContainer">
            <img src="assets/images/LandingPage.png" class="landingpage">
            <div class="companyInfo">
                <h2 class="companyName"> eResNetwork </h2>

            </div>
            <h3 class="companyHeader"> World's safest community for digital citizens</h3>
            <div class="heroContainer">
                <div class="catchPhrase">
                    <h2 class="Slogan"> Stay safe with us </h2>
                    <h2 class="Slogan2"> Sign up with an ID card </h2>
                </div>
                <div class="clickBaitContainer">
                    <button class="clickBait" data-bind="click: login">Let's Get Started!</button>
                    <div id="idLogo"></div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
</div>

<script type="text/html" id="chat_message">
    <div class="message-box" data-bind="css: { 'pull-right': id != homeVM.user_data()['id'] }">
        <div class="message" data-bind="css: { 'other': id != homeVM.user_data()['id'] }">
            <span data-bind="text: name"></span>
            <p data-bind="text: message"></p>
        </div>
    </div>
</script>