
(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs'));


(function (d,s,id) {
		   var js, ajs = d.getElementsByTagName(s)[0];
		   if (!d.getElementById(id)) {
			   js = d.createElement(s);
			   js.id = id;
			   js.src = "https://secure.assets.tumblr.com/share-button.js";
			   ajs.parentNode.insertBefore(js, ajs);
			}
		}(document, "script", "tumblr-js"));


(function () {
		   var li = document.createElement("script");
		   li.type = "text/javascript";
		   li.async = true;
		   li.src = ("https:" == document.location.protocol ? "https:" : "http:") + "//platform.stumbleupon.com/1/widgets.js";
		   var s = document.getElementsByTagName("script")[0];
		   s.parentNode.insertBefore(li, s);
		   })();


(function () {
        var po = document.createElement('script');
        po.type = 'text/javascript';
        po.async = true;
        po.src = 'https://apis.google.com/js/platform.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(po, s);
    })();
