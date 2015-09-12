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

        setInterval(function() {
            $.ajax({
                method: "POST",
                dataType: 'json',
                url: 'modules/messages.php',
                data: {action: 'getMessages'}
            }).done(function(messages) {
                self.chatMessages(messages);
            });
        }, 1000);
    }

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
}