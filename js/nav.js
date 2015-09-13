/**
 * Created by Andres on 12.09.2015.
 */

var nav = Sammy(function()
{
    var self = this;
    self.currentView = {
        view: ko.observable(''),
        itemID: null
    };

    self.get('#:view', function() {
        if ((this.params.view == 'profile' || this.params.view == 'content') && !homeVM.auth_done()) {
            self.currentView.view('#');
            location.hash = '';
            return;
        }

        self.currentView.view(this.params.view);
    });

    self.get('#:view/:itemID', function() {
        if (self.currentView.view() == this.params.view && self.currentView.itemID != this.params.itemID) {
            var needToRefresh = true;
        }

        self.currentView.itemID = this.params.itemID;
        self.currentView.view(this.params.view);

        if (needToRefresh) {
            self.currentView.view.valueHasMutated();
        }
    });

    self.get('', function() {
        $('body').css('overflow', "hidden");
        self.currentView.view('#');
    });

});