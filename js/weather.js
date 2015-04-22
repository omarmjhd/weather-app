function validateSignUp() {

    var form = document.forms["sign-up"];

    var firstName = form['firstName'].value;
    var lastName = form['lastName'].value;
    var userName = form['userName'].value;
    var password1 = form['password1'].value;
    var password2 = form['password2'].value;
    var email = form['email'].value;
    var city = form['city'].value;
    var color = form['color'].value;

    var emailRegex = new RegExp("^([^@]+[@][^@\.]+[.][0-9A-Za-x]{2,3})$");

    var valid = true;

    if (valid && (firstName.length === 0)) {

        alert("Please enter a first name.");
        valid = false;

    }

    if (valid && (lastName.length === 0)) {

        alert("Please enter a last name.");
        valid = false;

    }

    if (valid && (userName.length < 8 || userName.length > 15 || userName.indexOf(' ') != -1)) {

        alert("Please enter a username between 8-15 characters with no spaces.");
        valid = false;

    }

    if (valid && (password1.length < 8 || password1.length > 15 || password1.indexOf(' ') != -1)) {

        alert("Please enter a password between 8-15 characters with no spaces.");
        valid = false;

    }

    if (valid && (password1 != password2)) {

        alert("Please make sure your passwords match.");
        valid = false;

    }

    if (valid && (!emailRegex.test(email))) {

        alert("Please enter a valid email.");
        valid = false;

    }

    if (valid && (city === "noselect")) {

        alert("Please choose a city.");
        valid = false;

    }

    if (valid && (color === "noselect")) {

        alert("Please choose a color.");
        valid = false;

    }

    if (valid) {

        ajax = new XMLHttpRequest();

        var arguments = 'firstName=' + firstName + '&lastName=' + lastName + '&userName=' + userName + '&pass=' +
            password1 + '&email=' + email + '&city=' + city + '&color=' + color;

        ajax.open("POST", "php/sign-up.php", true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send(arguments);

        ajax.onreadystatechange = function() {

            if (ajax.readyState == 4 && ajax.status == 200) {

                if (ajax.responseText === "duplicate") {

                    alert("Sorry, that Username is already taken");

                } else {


                    document.getElementById('verifier').innerHTML = "Welcome " + firstName + " " + lastName;
                    alert("Sign up complete!");
                    console.log(ajax.responseText);
                    userPage(ajax.responseText);


                }

            }
        };

    }

    //TODO: put the weather function here
    return valid;

}

function validateSignIn() {

    var form = document.forms["sign-in"];

    var userName = form['userName'].value;
    var password1 = form['password1'].value;

    ajax = new XMLHttpRequest();

    var arguments = 'userName=' + userName + '&pass=' +
        password1;

    ajax.open("POST", "php/sign-in.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(arguments);

    ajax.onreadystatechange = function() {

        if (ajax.readyState == 4 && ajax.status == 200) {

            if (ajax.responseText === "failure") {

                alert("Sorry, that username and password combination doesn't exist. Please try again.");

            } else {

                alert("Welcome back " + userName + "!");
                console.log(ajax.responseText);
                userPage(ajax.responseText);

            }

        }
    };

}

function userPage(profile) {

    var parsedProfile = JSON.parse(profile);
    var city = parsedProfile[5];

    if (city === "4180439") {

        city = "Atlanta";

    } else if (city === "4699066") {

        city = "Houston";

    } else if (city === "5128581") {

        city = "New York";

    } else if (city === "5419384") {

        city = "Denver";

    } else {

        city = "Seattle";

    }

    getWeather(parsedProfile[5]);
    updatePage(parsedProfile, city);

}

function updatePage(profile, cityName) {

    document.getElementById('verifier').innerHTML = "<h1>Welcome " + profile[0] + " " + profile[1] + "<br></h1>" +
    "<p><br>Here's the weather in " + cityName + " for the next 5 days</p>";
    document.getElementById('page').style.background = profile[6];
    document.getElementById('verifier').style.visibility = "visible";
    document.getElementById('weather').style.visibility = "visible";

}

function getWeather(cityID) {

    ajax = new XMLHttpRequest();

    ajax.open("GET","php/weather.php?woeid=" + cityID ,true);
    ajax.send();

    ajax.onreadystatechange = function() {

        if (ajax.readyState == 4 && ajax.status == 200) {

            var parsedWeather = JSON.parse(ajax.responseText);
            var day = 0;

            //parsed weather is the json object
            //list is the list containing all the weather arrays
            //0-40, index of what weather val you're gonna use, for this (5, 13, 18, 29, 37) (each day at 12 pm)
            //"main" is where the data is stored
            //I'm gonna use temp, temp min, temp max
            //weather description comes from parsedWeather["list"][index]["weather"]["description"]

            for (var i = 0; i < 36; i+= 8) {

                var temp = Math.round((parsedWeather["list"][i]["main"]["temp"] - 273) * 1.8 + 32);
                var temp_min = Math.round((parsedWeather["list"][i]["main"]["temp_min"] - 273) * 1.8 + 32);
                var temp_max = Math.round((parsedWeather["list"][i]["main"]["temp_max"] - 273) * 1.8 + 32);
                var weather_description =  parsedWeather["list"][i]["weather"][0]["description"];
                var weather_formatted = weather_description.charAt(0).toUpperCase() + weather_description.slice(1);
                var date = parsedWeather["list"][i]["dt_txt"].substr(0, 10);

                document.getElementById('day' + day).innerHTML = date + "<br><br>" + weather_formatted +
                "<br><br>  Temp: " + temp + "&deg; F<br><br> Low: "+ temp_min + "&deg; F<br><br> High: " +
                temp_max + "&deg; F";

                day++;
            }

        }
    };

}

