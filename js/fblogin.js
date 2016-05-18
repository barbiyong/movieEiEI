//global
var $fbId ='/';
var $fname =0;
var $picId;
var $dataparse;
// This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      showInformation();
      //reload();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      //document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      //document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '{1212373392113632}',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.6' // use version 2.6
  });

    FB.Event.subscribe('auth.login', function() {
    window.location.reload();
    });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
    setTimeout(location.reload, 1000);
  });

  };

  // Load the SDK asynchronously
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.1&appId=1212373392113632";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function showInformation() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('me?fields=email,first_name,last_name', function(response) {
      //$fbId = $fbId.concat(response.id);
      //$picId = $fbId.concat("/picture");
      //$name = response.name;
      //$email = response.email;
      //var $test = $facebook->api()->api('/me?fields=relationship_status')
      $dataparse = JSON.stringify(response);
      //console.log(response);
      console.log($dataparse);
      document.getElementById("status").src='http://graph.facebook.com/'+response.id+'/picture';
    },{'scope':'email'});
    /*
    FB.api('/me/permission', function(response) {
      //$dataparse = JSON.stringify(response);
      console.log(response);
      document.getElementById("status").src='http://graph.facebook.com/'+response.id+'/picture';
    });*/
  }


