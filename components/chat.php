<div id="chat_module" data-bind="if: loaded">
    <div class="row">
        <div class="col-md-12">
            <div class="chat-box">
                <!-- ko foreach: chatMessages -->
                    <!-- ko template: { name: 'chat_message', data: $data } --><!-- /ko -->
                <!-- /ko -->
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <form action="#" data-bind="submit: sendMessage">
            <div class="col-md-11">
                <div class="chat-input-box">
                    <input type="input" class="form-control" data-bind="textInput: currentMessage" />
                </div>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary"
                        style="width: 100%;">Send
                </button>
            </div>
        </form>
    </div>

<!----------------------------------------------------------------------->
    <script type="text/html" id="chat_message">
        <div class="chat-message-container">
            <b class="chat-user-name" data-bind="text: chat_name"></b>
            <span class="chat-message" data-bind="text: message"></span>
        </div>
    </script>
</div>