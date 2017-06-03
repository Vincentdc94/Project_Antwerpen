UI.Notification = (function () {

    return {
        init: function () {
            var notification = document.getElementById('notification');

            var notifications = document.getElementsByClassName('notification');
            for (let notificationIndex = 0; notificationIndex < notifications.length; notificationIndex++) {
                if (notifications[notificationIndex].children.length === 0) {
                    notifications[notificationIndex].classList.add('notification-empty');
                }
            }
        }
    }
})();