
Notification.requestPermission().then(function(result) {
  if (result === 'denied') {
    console.log('Permission wasn\'t granted. Allow a retry.');
    return;
  }
  if (result === 'default') {
    console.log('The permission request was dismissed.');
    return;
  }  
});


function notify(name) {

    if(name) {

        if(Notification.permission !== 'denied' || Notification.permission === "default") {

            Notification.requestPermission(function (permission) {

                if(permission === "granted") {

                    var options = {
                        "body": "Did you make a $1,000,000 purchase at Dr. Evil...",
                        "icon": "images/ccard.png",
                            "vibrate": [200, 100, 200, 100, 200, 100, 400],
                            "tag": "request",
                            "actions": [
                                { "action": "yes", "title": "Yes", "icon": "images/yes.png" },
                                { "action": "no", "title": "No", "icon": "images/no.png" }
                            ]
                        }

                        ServiceWorkerRegistration.showNotification("Adblot Says", options);

                    // var options = {
                    //     body: name + " has posted a request.",
                    //     icon: 'http://192.168.1.102/botfather/intranet/creative-request-form/assets/img/icon.png',
                    // }

                    // var notification = new Notification("Adblot Says", options); // Notification call, adjust this when using more calls.

                    // setTimeout(notification.close.bind(notification), 5000);

                }
            })
        }

    }
    
}
