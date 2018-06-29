let ajax = {

    /**
     * - REQUEST -
     * @param {string} url - URL of the page you wanna get
     * @param {string} method - POST (default) or GET
     * @param {string/object} data - The data you want to send
     * @param {function} success_function - If you wanna add a function
     */
    request: function(url, method = "POST", data = false, success_function = false) {
/**/
        method = method.toUpperCase();
        // If there's Data present
        if (data) {
            // Make into string from object (POST) if it isn't already (GET)
            var params = (typeof data == "string" ? data : Object.keys(data).map(function(key){
                    return encodeURIComponent(key) + "=" + encodeURIComponent(data[key]);
                }).join('&')
            );
        }
        // If method is GET, add the GET variables to the URL
        if (method === 'GET') {
            url = url + "?" + params
        }

        // Start XMLHttpRequest object (ActiveXObject if Internet Explorer)
        let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        // Open request
        request.open(method, url);
        // Listen for response
        request.onreadystatechange = function () {
            // If there's response
            if (this.readyState > 3 && this.status === 200) {
                // Run function on success if set
                if (success_function) {
                    success_function(this.responseText)
                } // Otherwise just return the page
                else {
                    return this.responseText;
                }
            }
        };
        // If method is POST
        if (method === "POST") {
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send(params);
        } // If method is GET
        else {
            request.send();
        }
    }
};

