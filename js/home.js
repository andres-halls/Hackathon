/**
 * Created by Andres on 11.09.2015.
 */

function homeViewModel() {
    var self = this;
    self.view = '#';
    self.loaded = ko.observable(true);

    self.login = function() {
        c('login'); // TODO
    }
}