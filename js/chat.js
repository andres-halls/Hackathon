/**
 * Created by Andres on 11.09.2015.
 */

function chatViewModel() {
    var self = this;

    self.socket = {};
    self.currentMessage = ko.observable('');
    self.chatMessages = ko.observableArray([]);

    // Initialize socket.io connection to server
    self.init = function() {
        self.socket = io('server address and port here');
    };

    self.sendMessage = function() {
        if (!self.currentMessage()) return;
        //socket.emit('new message', { user_ID: homeVM.user_ID, message: self.currentMessage() });
        self.chatMessages.push({ chat_name: homeVM.user_name, message: self.currentMessage() });
        self.currentMessage('');
    };

    self.messageReceived = function(msg_data) {
        self.chatMessages.push({ chat_name: msg_data.chat_name, message: msg_data.message });
    };

    //self.socket.on('chat message', self.messageReceived);
}