
function showJointApplicantTab(el) {
    $secondary = $('.secondary-applicant');
    $secondary.each(function(e) {
        $div = $($secondary)[e];
        $($div).removeClass("disabled");
    });
}

function hideJointApplicantTab(el) {
    $secondary = $('.secondary-applicant');
    $secondary.each(function(e) {
        $div = $($secondary)[e];
        $($div).addClass("disabled");
    });
}

function swapBottom(flag) {
    if (flag == "off") {
        $('#bottom-1').show();
        $('#bottom-2').hide();
        $('.tab-pane').show();
        $('.next-step').show();
    } else {
        $('#bottom-1').hide();
        $('.tab-pane').hide();
        $('#bottom-2').show();
        $('.next-step').hide();
        $('.prev-step').hide();
    }
}

function nextTab(el) {
    $nextTab = $(el).next('div');
    if(!$($nextTab).hasClass("tab-pane") || $($nextTab).hasClass("disabled")) {
        swapBottom("on");
        return false;
    }
    $(el).removeClass("active");
    $($nextTab).addClass("active");
}

function prevTab(el) {
    $prevTab = $(el).prev('div');
    if (!$($prevTab).hasClass("tab-pane")) {
        return false;
    }
    swapBottom("off");
    $(el).removeClass("active");
    $($prevTab).addClass("active");
}


$(document).ready(function() {
    $('.prev-step').hide();
    $('.nav-tabs > li a[title]').tooltip();

    $('.next-step').on("click", function(e) {
        $('.prev-step').show();
        var $inputs = $('.tab-content .active').find("input");
        var $selects = $('.tab-content .active').find("select");
        var valid = true;

        $inputs.each(function() {
            if(!$(this).valid() && valid) {
                valid = false;
            }
        });
        $selects.each(function() {
            if(!$(this).valid() && valid) {
                valid = false;
            }
        });

        if (valid === false) {
            return false;
        }
        var $active=$('.tab-content > .tab-pane.active');
        nextTab($active);
    });
    $('.prev-step').on("click", function(e) {
        var $active = $('.tab-content > .tab-pane.active');
        prevTab($active);
    });

    $('input[name=ApplicationType]').on('change', function(e) {
        if($('input[name="data[ApplicationType]"]:checked').val() == 'Joint') {
            showJointApplicantTab(e);
        } else {
            hideJointApplicantTab(e);
        }
    });

    $("[data-hide]").on("click", function(e) {
        $('.alert').addClass("collapse");
        $('.alert').alert('hide');
    });

    //use link to submit form instead of button
    $("a[id=submit]").click(function() {
        $(this).parents("form").submit();
    });

    $('[data-toggle="tooltip"]').tooltip();

    $.validator.addMethod("realDate", function(value, element) {

        function leapYear(year) {
          return (year % 4 == 0 && year % 100 != 0) || year % 400 == 0;
        }

        var d,dArray,mm,dd,yyyy;

        // check if valid date
        try {
            d = Date.parse(value);
            dArray = value.split('/');
            mm = parseInt(dArray[0]);
            dd = parseInt(dArray[1]);
            yyyy = parseInt(dArray[2]);
        } catch (e) {
            console.error(e);
            return false
        }

        // check if year is valid
        if (yyyy<1900 && yyyy>3000) {
            return false;
        }

        // check if month is valid
        if (mm < 1 || mm > 12) {
            return false;
        }

        // get the highest day it could be for that month in that year
        var highestDay = 0;
        if (leapYear(yyyy) && (mm === 2)) {
            highestDay = 29;
        } else {
            if (mm === 2) {
                highestDay = 28;
            } else {
                highestDay = [1,3,5,7,8,10,12].includes(mm) ? 31 : 30
            }
        }
        var res = dd > 0 && dd <= highestDay;

        console.log(dd,mm,yyyy,leapYear(yyyy),highestDay,res);

        return res;

    }, "Please enter a valid date.");

    $.validator.addMethod("over21", function(value, element) {
        function _calculateAge(birthday) { // birthday is a date
            var ageDifMs = Date.now() - birthday.getTime();
            var ageDate = new Date(ageDifMs); // miliseconds from epoch
            return Math.abs(ageDate.getUTCFullYear() - 1970);
        }

        try {
            var d = new Date(value);
            return (_calculateAge(d) > 21);
        } catch (e) {
          console.error(e);
          return false;
        }
    }, "You must be over 21 to apply for a loan.");


    $("form").validate({ errorPlacement: function(error, element) {
        error.insertAfter(element.parent());
      }, rules: { "data[applicants][0][DateOfBirth]": { realDate: true, over21: true } } });
});

// Array.includes polyfill
// https://tc39.github.io/ecma262/#sec-array.prototype.includes
if (!Array.prototype.includes) {
  Object.defineProperty(Array.prototype, 'includes', {
    value: function(searchElement, fromIndex) {

      if (this == null) {
        throw new TypeError('"this" is null or not defined');
      }

      // 1. Let O be ? ToObject(this value).
      var o = Object(this);

      // 2. Let len be ? ToLength(? Get(O, "length")).
      var len = o.length >>> 0;

      // 3. If len is 0, return false.
      if (len === 0) {
        return false;
      }

      // 4. Let n be ? ToInteger(fromIndex).
      //    (If fromIndex is undefined, this step produces the value 0.)
      var n = fromIndex | 0;

      // 5. If n ≥ 0, then
      //  a. Let k be n.
      // 6. Else n < 0,
      //  a. Let k be len + n.
      //  b. If k < 0, let k be 0.
      var k = Math.max(n >= 0 ? n : len - Math.abs(n), 0);

      function sameValueZero(x, y) {
        return x === y || (typeof x === 'number' && typeof y === 'number' && isNaN(x) && isNaN(y));
      }

      // 7. Repeat, while k < len
      while (k < len) {
        // a. Let elementK be the result of ? Get(O, ! ToString(k)).
        // b. If SameValueZero(searchElement, elementK) is true, return true.
        if (sameValueZero(o[k], searchElement)) {
          return true;
        }
        // c. Increase k by 1. 
        k++;
      }

      // 8. Return false
      return false;
    }
  });
}