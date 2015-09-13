/**
 * Created by Andres on 12.09.2015.
 */

function profileViewModel() {
    var self = this;
    self.view = 'profile';
    self.loaded = ko.observable(false);

    self.socket = {};
    self.currentMessage = ko.observable('');
    self.chatMessages = ko.observableArray([]);
    self.friends = ko.observableArray([]);
    self.lastLength = 0;
    self.descEditable = ko.observable(false);
    self.description = ko.observable('');

    nav.currentView.view.subscribe(function(newView){
        if ( newView == self.view ) {
            if( self.loaded() ){
                //
            } else {
                self.init();
            }
        }
    });

    self.init = function() {
        self.loaded(true);
        $('body').css('overflow', "auto");

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: 'modules/addRelation.php',
            data: {action: 'get', user_id: homeVM.user_data()['id']}
        }).done(function(result) {
            self.friends(result);
        });

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: 'modules/editProfile.php',
            data: {action: 'get', user_id: homeVM.user_data()['id']}
        }).done(function(result) {
            self.description(result['description']);
        });

        setInterval(function() {
            $.ajax({
                method: "POST",
                dataType: 'json',
                url: 'modules/messages.php',
                data: {action: 'getMessages'}
            }).done(function(messages) {
                self.chatMessages(messages);
                if (self.lastLength != messages.length) {
                    self.lastLength = messages.length;
                    $('.chat-box').scrollTop($('.chat-box')[0].scrollHeight);
                }
            });
        }, 1000);
    };

    // Socket IO

    /*// Initialize socket.io connection to server
    self.initSocketIO = function() {
        self.socket = io('server address and port here');
    };

    self.sendMessage = function() {
        if (!self.currentMessage()) return;
        //socket.emit('new message', { user_ID: homeVM.user_ID, message: self.currentMessage() });
        self.chatMessages.push({ chat_name: homeVM.user_data()['firstName'] + ' ' + homeVM.user_data()['lastName'] + ':', message: self.currentMessage() });
        self.currentMessage('');
    };

    self.messageReceived = function(msg_data) {
        self.chatMessages.push({ chat_name: msg_data.chat_name, message: msg_data.message });
    };

    //self.socket.on('chat message', self.messageReceived);*/

    self.sendMessage = function() {
        if (!self.currentMessage()) return;
        var message = self.currentMessage();
        self.currentMessage('');

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: 'modules/messages.php',
            data: {action: 'putMessage', userId: homeVM.user_data()['id'], message: message}
        }).done(function(result) {
            self.chatMessages.push({ chat_name: homeVM.user_data()['firstName'] + ' ' + homeVM.user_data()['lastName'] + ':', message: message });
        });
    };

    self.addFriend = function(data, event) {
        var contact_id = event.added.id;
        var name = event.added.text;
        self.friends.push({name: name});

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: 'modules/addRelation.php',
            data: {action: 'add', user_id: homeVM.user_data()['id'], contact_id: contact_id, relation: 'friend'}
        });
    };

    self.calcSex = ko.pureComputed(function() {
        var checkNum = String(homeVM.user_data()['identificationCode']).charAt(0);
        checkNum = Number(checkNum);

        if (checkNum % 2 == 0) {
            return 'Female';
        } else {
            return 'Male';
        }
    });

    self.editButtonClick = function() {
        if (!self.descEditable()) {
            self.descEditable(true);
            return;
        }

        self.descEditable(false);

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: 'modules/editProfile.php',
            data: {action: 'update', user_id: homeVM.user_data()['id'], description: self.description()}
        });
    }
}