/**
 * Created by Andres on 11.09.2015.
 */

function c(obj) {
    console.log(obj);
}

var homeVM = new homeViewModel();
var profileVM = new profileViewModel();
var chatVM = new chatViewModel();

$(function() {
    ko.applyBindings(homeVM, document.getElementById('home_page'));
    ko.applyBindings(profileVM, document.getElementById('profile_page'));
    ko.applyBindings(chatVM, document.getElementById('chat_module'));
    nav.run();
    //chatVM.init();
});