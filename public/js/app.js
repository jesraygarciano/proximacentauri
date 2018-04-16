
$("[data-toggle=tooltip").tooltip();


function ValidateEmail(email) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
  {
    return (true)
  }
    return (false)
}

function validatePhonenumber(phoneNumber)
{
  	if(!isNaN(phoneNumber) && !(phoneNumber.replace(' ','') == ''))
	{
		return true;
	}
	else
	{
		return false;
	}
}

// $("#domestic").on("click",function(){

//         // $(".provinceopening").css({'border' : '1px solid #96c8da','color' : '#285363'});
//         // $(".provinceopening").attr('disabled', false);
//         // $("#postal-code-add").css({'border' : '1px solid #96c8da','color' : '#285363'});
//         // $("#postal-code-add").attr('disabled', false);
//         // $("#opening_city").css({'border' : '1px solid #dededf','color' : '#dededf'});
//         // $("#opening_city").attr('disabled', true);
//         // $(".opening_country").css({'border' : '1px solid #dededf','color' : '#dededf'});
//         // $(".opening_country").prop('disabled', true);

//         $("#domestic-address").css('display' , 'initial');
//         $("#international-address").css('display' , 'none');
//     });

// $("#international").on("click",function(){
//         // $(".provinceopening").css({'border' : '1px solid #dededf','color' : '#dededf'});
//         // $(".provinceopening").attr('disabled', true);
//         // $("#postal-code-add").css({'border' : '1px solid #dededf','color' : '#dededf'});
//         // $("#postal-code-add").attr('disabled', true);
//         // $("#opening_city").css({'border' : '1px solid #96c8da', 'color' : '#285363'});
//         // $("#opening_city").prop('disabled', false);
//         // $(".opening_country").css({'border' : '1px solid #96c8da', 'color' : '#285363'});
//         // $(".opening_country").prop('disabled', false);

//         $('.opening_country').prop('disabled', false);
//         $("#domestic-address").css('display' , 'none');
//         $("#international-address").css('display' , 'initial');        
//     });

/***********************Opening create/edit Date*********************/
var dateFormat = function () {
    var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
        timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
        timezoneClip = /[^-+\dA-Z]/g,
        pad = function (val, len) {
            val = String(val);
            len = len || 2;
            while (val.length < len) val = "0" + val;
            return val;
        };

    // Regexes and supporting functions are cached through closure
    return function (date, mask, utc) {
        var dF = dateFormat;

        // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
        if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
            mask = date;
            date = undefined;
        }

        // Passing date through Date applies Date.parse, if necessary
        date = date ? new Date(date) : new Date;
        if (isNaN(date)) throw SyntaxError("invalid date");

        mask = String(dF.masks[mask] || mask || dF.masks["default"]);

        // Allow setting the utc argument via the mask
        if (mask.slice(0, 4) == "UTC:") {
            mask = mask.slice(4);
            utc = true;
        }

        var _ = utc ? "getUTC" : "get",
            d = date[_ + "Date"](),
            D = date[_ + "Day"](),
            m = date[_ + "Month"](),
            y = date[_ + "FullYear"](),
            H = date[_ + "Hours"](),
            M = date[_ + "Minutes"](),
            s = date[_ + "Seconds"](),
            L = date[_ + "Milliseconds"](),
            o = utc ? 0 : date.getTimezoneOffset(),
            flags = {
                d:    d,
                dd:   pad(d),
                ddd:  dF.i18n.dayNames[D],
                dddd: dF.i18n.dayNames[D + 7],
                m:    m + 1,
                mm:   pad(m + 1),
                mmm:  dF.i18n.monthNames[m],
                mmmm: dF.i18n.monthNames[m + 12],
                yy:   String(y).slice(2),
                yyyy: y,
                h:    H % 12 || 12,
                hh:   pad(H % 12 || 12),
                H:    H,
                HH:   pad(H),
                M:    M,
                MM:   pad(M),
                s:    s,
                ss:   pad(s),
                l:    pad(L, 3),
                L:    pad(L > 99 ? Math.round(L / 10) : L),
                t:    H < 12 ? "a"  : "p",
                tt:   H < 12 ? "am" : "pm",
                T:    H < 12 ? "A"  : "P",
                TT:   H < 12 ? "AM" : "PM",
                Z:    utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
                o:    (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
                S:    ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
            };

        return mask.replace(token, function ($0) {
            return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
        });
    };
}();

// Some common format strings
dateFormat.masks = {
    "default":      "ddd mmm dd yyyy HH:MM:ss",
    shortDate:      "m/d/yy",
    mediumDate:     "mmm d, yyyy",
    longDate:       "mmmm d, yyyy",
    fullDate:       "dddd, mmmm d, yyyy",
    shortTime:      "h:MM TT",
    mediumTime:     "h:MM:ss TT",
    longTime:       "h:MM:ss TT Z",
    isoDate:        "yyyy-mm-dd",
    isoTime:        "HH:MM:ss",
    isoDateTime:    "yyyy-mm-dd'T'HH:MM:ss",
    isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
};

// Internationalization strings
dateFormat.i18n = {
    dayNames: [
        "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
        "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
    ],
    monthNames: [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    ]
};

// For convenience...
Date.prototype.format = function (mask, utc) {
    return dateFormat(this, mask, utc);
};
/***********************Opening create/edit Date*********************/


(function($) { 
	
	var bgImageArray = ['photo-1508921234172-b68ed335b3e6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=92e40b3819e4c173debf1500f27c9b60&auto=format&fit=crop&w=1500&q=80', 'photo-1448932223592-d1fc686e76ea?ixlib=rb-0.3.5&s=990bfb15aef2718e2488c1c36452afc4&auto=format&fit=crop&w=1498&q=80','photo-1497493292307-31c376b6e479?ixlib=rb-0.3.5&s=413bf668e2139f6aae03f6355bcd59a7&auto=format&fit=crop&w=1502&q=80','photo-1508921234172-b68ed335b3e6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=92e40b3819e4c173debf1500f27c9b60&auto=format&fit=crop&w=750&q=80'],
	base = "https://images.unsplash.com/",
	secs = 4;
	bgImageArray.forEach(function(img){
	    new Image().src = base + img; 
	    // caches images, avoiding white flash between background replacements
	});
	
	function backgroundSequence() {
  	console.log('url(' + base + bgImageArray[0] +')');
		window.clearTimeout();
		var k = 0;
		for (i = 0; i < bgImageArray.length; i++) {
			setTimeout(function(){ 
				$('.tab-content-wrapper').css({
        	'background': "url(" + base + bgImageArray[k] + ") no-repeat center center fixed rgba(0,0,0,.7)"
        });
				$('.tab-content-wrapper').css({
        	'background-size': "cover"
        });				
			if ((k + 1) === bgImageArray.length) { setTimeout(function() { backgroundSequence() }, (secs * 1000))} else { k++; }			
			}, (secs * 3000) * i)	
		}
	}
	backgroundSequence();  
	
}(jQuery));