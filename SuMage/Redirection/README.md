
****Redirect user to login page if user is not login ****
-> First create module.xml and registration.php to register a module to magento 2.

-> Create an events.xml in /etc/frontend/events.xml and also create an observer in /Observer/RestrictWebsite.php.

-> Its done.Your redirection will be working with magento 2.

->If your magento is running with Varnish caching then you need to add some line of code in varnish configuration.Because Varnish cache didn't work with specific country.Varnish cache store a hole page for every user.
-> Go to /etc/varnish/default.vcl(location of varnish) and find "sub vcl_hash" method and add req.http.cf-ipcountrywith 3 location as mentioned below:-

->sub vcl_hash {
    if (req.http.cookie ~ "X-Magento-Vary=") {
        hash_data(regsub(req.http.cookie+req.http.cf-ipcountry, "^.*?X-Magento-Vary=([^;]+);*.*$", "\1"));
    }

    # For multi site configurations to not cache each other's content
    if (req.http.host) {
        hash_data(req.http.host+req.http.cf-ipcountry);
    } else {
        hash_data(server.ip+req.http.cf-ipcountry);
    }

    # To make sure http users don't see ssl warning
    if (req.http.X-Forwarded-Proto) {
        hash_data(req.http.X-Forwarded-Proto);
    }

}

->After this you need to restart your varnish services and also your server like apache2 or nginx etc. Now it'll work(caching + redirection based on country) with redirection.
