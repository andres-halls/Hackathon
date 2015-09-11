/**
 * Created by Andres on 11.09.2015.
 */

function chatViewModel() {
    var self = this;
    self.loaded = ko.observable(true);

    self.socket = {};
    self.currentMessage = ko.observable('');
    self.chatMessages = ko.observableArray([]);

    // Initialize websocket connection to server
    self.init = function() {
        self.socket = io();
    };

    self.sendMessage = function() {
        if (!self.currentMessage()) return;
        //socket.emit('new message', self.currentMessage());
        self.chatMessages.push({ chat_name: 'Me:', message: self.currentMessage() });
        self.currentMessage('');
    };

    self.messageReceived = function(msg_data) {
        self.chatMessages.push({ chat_name: msg_data.chat_name, message: msg_data.message });
    };

    //self.socket.on('chat message', self.messageReceived);
}